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

        $result
            ->getExtensionAttributes()
            ->setCommentData($orderAttribute->getComment() ?? '');

        return $result;

        //$extensionAttributes = $result->getExtensionAttributes();
        //$extensionAttributes->setCommentData($orderAttribute->getComment());
        //$extensionAttributes->setCommentData('test1');

        //$result->setExtensionAttributes($extensionAttributes);

        //return $result;
    }

    public function afterSave(
        OrderRepositoryInterface $subject,
        OrderInterface $result,
        OrderInterface $entity
    ) {
        $extensionAttributes = $entity->getExtensionAttributes();
        $commentData = $extensionAttributes->getCommentData();
        $commentData = 'DUMMY COMMENT';

        $orderAttribute = $this->repository->getByOrderId((int) $result->getEntityId());
        $orderAttribute
            ->setOrderId($result->getEntityId())
            ->setComment($commentData);
        $this->repository->save($orderAttribute);

        $resultAttributes = $result->getExtensionAttributes();
        $resultAttributes->setCommentData($commentData);
        $result->setExtensionAttributes($resultAttributes);

        return $result;
    }
}
