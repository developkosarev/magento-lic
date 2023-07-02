<?php

declare(strict_types=1);

namespace Diko\DeviceSync\CustomerData;

use DateTime;
use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Helper\Session\CurrentCustomer;

class DeviceSync implements SectionSourceInterface
{
    /** @var CurrentCustomer */
    private CurrentCustomer $currentCustomer;

    /**
     * @param CurrentCustomer $currentCustomer
     */
    public function __construct(CurrentCustomer $currentCustomer)
    {
        $this->currentCustomer = $currentCustomer;
    }

    /**
     * @inheritdoc
     */
    public function getSectionData(): array
    {
        if (!$this->currentCustomer->getCustomerId()) {
            return [];
        }

        $now = new DateTime();

        return [
            'now' => $now->format('Y-m-d H:i:s'),
            'updateCustomer' => false,
            'updateCart' => false
        ];
    }
}
