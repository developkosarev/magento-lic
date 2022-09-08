<?php

declare(strict_types=1);

namespace Diko\OrderAttributes\Plugin;

use Diko\OrderAttributes\Api\OrderAttributesRepositoryInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderRepositoryPlugin
{
    /**
     * @var OrderAttributesRepositoryInterface $repository
     */
    private OrderAttributesRepositoryInterface $repository;

    public function __construct(OrderAttributesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function afterGet(OrderRepositoryInterface $subject, OrderInterface $result): OrderInterface
    {
        $orderAttribute = $this->repository->getByOrderId((int) $result->getEntityId());

        $extensionAttributes = $result->getExtensionAttributes();
        //$extensionAttributes->setCommentData('test1');
        $extensionAttributes->setCommentData($orderAttribute->getComment());

        $result->setExtensionAttributes($extensionAttributes);

        return $result;
    }
}
