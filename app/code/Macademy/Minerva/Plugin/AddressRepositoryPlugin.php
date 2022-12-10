<?php

declare(strict_types=1);

namespace Macademy\Minerva\Plugin;

use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class AddressRepositoryPlugin
{
    public function beforeSave(AddressRepositoryInterface $subject, AddressInterface $address)
    {
        //throw new CouldNotSaveException(
        //    __('An error occurred on the server. Please try to place the order again.')
        //);

        return null;
    }

}
