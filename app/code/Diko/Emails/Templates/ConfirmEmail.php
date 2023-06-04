<?php
declare(strict_types=1);

namespace Diko\Emails\Templates;

use Magento\Customer\Api\Data\CustomerInterface;

class ConfirmEmail extends AbstractEmail implements ConfirmEmailInterface
{
    public const XML_PATH_UNSUBSCRIBE_SUCCESS_EMAIL_TEMPLATE
        = 'diko_newsletter_email_section/sendmail/email_unsubscribe_success_template';

    public const XML_PATH_UNSUBSCRIBE_SUCCESS_EMAIL_IDENTITY = 'diko_newsletter_email_section/sendmail/sender';

    protected CustomerInterface $customer;

    #region OverriddenMethods
    protected function getTemplate(): string
    {
        return self::XML_PATH_UNSUBSCRIBE_SUCCESS_EMAIL_TEMPLATE;
    }

    protected function getIdentity(): string
    {
        return self::XML_PATH_UNSUBSCRIBE_SUCCESS_EMAIL_IDENTITY;
    }

    public function getStoreId(): int
    {
        return (int)$this->customer->getStoreId();
    }

    public function getEmail(): string
    {
        return $this->customer->getEmail();
    }

    #endregion

    public function setCustomer(CustomerInterface $customer = null): self
    {
        $this->customer = $customer;
        return $this;
    }
}
