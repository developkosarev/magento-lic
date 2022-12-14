<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\Plugin;

use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Quote\Model\QuoteRepository;

class ShippingInformationManagementPlugin
{
    /**
     * @var QuoteRepository
     */
    protected $quoteRepository;

    /**
     * ShippingInformationManagement constructor.
     *
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        ShippingInformationInterface $addressInformation
    ) {
        //$extAttributes = $addressInformation->getExtensionAttributes();
        //$gstNumber = $extAttributes->getGstNumber();

        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setCustomerNote('DUMMY COMMENT');
    }
}
