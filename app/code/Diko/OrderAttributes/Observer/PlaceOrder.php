<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\Observer;

use Diko\OrderAttributes\Api\Data\OrderAttributesInterface;
use Diko\OrderAttributes\Api\OrderAttributesRepositoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class PlaceOrder implements ObserverInterface
{
    /**
     * @var OrderAttributesRepositoryInterface $repository
     */
    private OrderAttributesRepositoryInterface $repository;

    public function __construct(OrderAttributesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getEvent()->getData('order');

        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $observer->getEvent()->getData('quote');

        $order->setCustomerNote($quote->getCustomerNote());


        /** @var \Diko\OrderAttributes\Api\Data\OrderAttributesInterface */
        $orderAttribute = $this->repository->getByOrderId((int) $order->getEntityId());
        $orderAttribute->setOrderId($order->getEntityId());
        $orderAttribute->setComment($quote->getCustomerNote());

        //$this->repository->save($orderAttribute);

        //$extensionAttributes = $order->getExtensionAttributes();
        //$extensionAttributes->setCommentData('test1');
        //$extensionAttributes->setCommentData($orderAttribute->getComment());


        return $this;
    }
}
