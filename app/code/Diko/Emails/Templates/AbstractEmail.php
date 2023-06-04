<?php
declare(strict_types=1);

namespace Diko\Emails\Templates;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

abstract class AbstractEmail implements EmailInterface
{
    /** @var ScopeConfigInterface */
    protected ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    abstract protected function getTemplate(): string;

    abstract protected function getIdentity(): string;

    public function getTemplateIdentifier(): string
    {
        return $this->scopeConfig->getValue($this->getTemplate(), ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }

    public function getSenderEmail(): string
    {
        return $this->scopeConfig->getValue($this->getIdentity(), ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }

    public function getTemplateVars(): array
    {
        return [];
    }
}
