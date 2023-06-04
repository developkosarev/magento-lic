<?php
declare(strict_types=1);

namespace Diko\Emails\Templates;

use Magento\Customer\Api\Data\CustomerInterface;

interface ConfirmEmailInterface extends EmailInterface
{
    public function setCustomer(CustomerInterface $customer = null): self;
}
