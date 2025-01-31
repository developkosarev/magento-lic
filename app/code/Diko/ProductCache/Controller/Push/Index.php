<?php

declare(strict_types=1);

namespace Diko\ProductCache\Controller\Push;

use Diko\ProductCache\Model\Cache\Type\ProductAttr;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private ResultFactory $resultFactory,
        private CacheInterface $cache,
        private SerializerInterface $serializer,
        private StoreManagerInterface $storeManager,
        private CollectionFactory $productCollectionFactory
    ) {}

    public function execute(): Json
    {
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addAttributeToSelect('entity_id');
        $stores = $this->storeManager->getStores();

        $result = [];
        foreach ($productCollection as $product) {
            $productId = $product->getId();

            foreach ($stores as $store) {
                $storeId = $store->getId();
                $cacheKey = ProductAttr::TYPE_IDENTIFIER . "_{$productId}_{$storeId}";

                $result[$cacheKey] = $this->cache->load($cacheKey);
            }
        }

        /** @var Json $jsonResult */
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $jsonResult->setData($result);

        return $jsonResult;
    }
}
