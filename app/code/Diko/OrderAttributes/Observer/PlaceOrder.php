<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\Observer;

use Diko\OrderAttributes\Api\Data\OrderAttributesInterface;
use Diko\OrderAttributes\Api\OrderAttributesRepositoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class PlaceOrder implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getEvent()->getData('order');

        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $observer->getEvent()->getData('quote');

        //$order->setCustomerNote($quote->getCustomerNote());
        $order->getExtensionAttributes()
            ->setCommentData($quote->getCustomerNote());

        return $this;
    }
}
