<?php

declare(strict_types=1);

namespace Diko\ProductCache\Command;

use Diko\ProductCache\Model\Cache\Type\ProductAttr;
use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Bundle\Model\ResourceModel\Selection;
use Magento\Framework\App\CacheInterface;

class CacheProductsCommand extends Command
{
    public function __construct(
        private StoreManagerInterface $storeManager,
        private CollectionFactory $productCollectionFactory,
        private Selection $selectionResource,
        private CacheInterface $cache
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('diko:cache:products')
            ->setDescription('Caches product children IDs using DIKO_PRODUCTS tag.');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToSelect('entity_id');
        $stores = $this->storeManager->getStores();

        foreach ($productCollection as $product) {
            $productId = $product->getId();

            foreach ($stores as $store) {
                $storeId = $store->getId();
                $childrenIds = $this->selectionResource->getChildrenIds($productId);
                $cacheKey = ProductAttr::TYPE_IDENTIFIER . "_{$productId}_{$storeId}";

                $this->cache->save(json_encode($childrenIds), $cacheKey, [ProductAttr::CACHE_TAG]);

                $output->writeln("Cached product ID: {$productId} for store ID: {$storeId}");
            }
        }

        $output->writeln('<info>Cache updated successfully.</info>');
        return Cli::RETURN_SUCCESS;
    }
}
