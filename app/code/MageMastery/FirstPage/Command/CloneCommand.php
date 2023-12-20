<?php

declare(strict_types=1);

namespace MageMastery\FirstPage\Command;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Catalog\Model\ResourceModel\Category\Collection;

class CloneCommand extends Command
{
    private const NAME = 'name';

    private ProductRepositoryInterface $productRepository;

    private ProductInterfaceFactory $productFactory;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductInterfaceFactory $productFactory
    ) {
        $this->productRepository = $productRepository;
        $this->productFactory = $productFactory;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('my:first:clone');
        $this->setDescription('This is my first console command.');
        $this->addOption(self::NAME, null, InputOption::VALUE_REQUIRED, 'Name');

        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exitCode = 0;

        if ($name = $input->getOption(self::NAME)) {
            $output->writeln('<info>Provided name is `' . $name . '`</info>');
        }

        $output->writeln('<info>Success message.</info>');
        $output->writeln('<comment>Some comment.</comment>');

        $originalProductId = 1;

        try {
            $originalProduct = $this->productRepository->getById($originalProductId);
            $clonedProduct = $this->cloneProduct($originalProduct);
            $this->productRepository->save($clonedProduct);
            echo "Product cloned successfully. New product ID: " . $clonedProduct->getId() . PHP_EOL;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . PHP_EOL;
        }

        return $exitCode;
    }

    protected function cloneProduct($product): ?ProductInterface
    {
        $productData = $product->getData();
        unset($productData['entity_id']);
        unset($productData['sku']);
        unset($productData['url_key']);
        unset($productData['media_gallery']);

        $clonedProduct = $this->productFactory->create();
        $clonedProduct->setData($productData);
        $clonedProduct->setStatus(0);
        $clonedProduct->setName('Cloned ' . $product->getName());
        $clonedProduct->setSku('CLONE_' . $product->getSku());
        return $clonedProduct;
    }
}
