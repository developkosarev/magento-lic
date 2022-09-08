<?php

declare(strict_types=1);

namespace Diko\OrderAttributes\Plugin;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductSearchResultsInterface;

class ProductRepositoryPlugin
{
    public function afterGet(ProductRepositoryInterface $subject, ProductInterface $result): ProductInterface
    {
        $extensionAttribute = $result->getExtensionAttributes();
        $extensionAttribute->setCustomData("This is my custom Data");

        $result->setExtensionAttributes($extensionAttribute);

        return $result;
    }

    public function afterGetList(ProductRepositoryInterface $subject, ProductSearchResultsInterface $searchResults): ProductSearchResultsInterface
    {
        $products = [];
        foreach ($searchResults->getItems() as $entity) {
            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setCustomData("This is my custom Data");
            $entity->setExtensionAttributes($extensionAttributes);

            $products[] = $entity;
        }
        $searchResults->setItems($products);
        return $searchResults;
    }

    public function afterSave(ProductRepositoryInterface $subject, ProductInterface $result, ProductInterface $entity): ProductInterface
    {
        $extensionAttributes = $entity->getExtensionAttributes();
        $customData = $extensionAttributes->getCustomData();
        //$this->customDataRepository->save($customData);

        $resultAttributes = $result->getExtensionAttributes();
        $resultAttributes->setCustomData($customData);
        $result->setExtensionAttributes($resultAttributes);

        return $result;
    }

}
