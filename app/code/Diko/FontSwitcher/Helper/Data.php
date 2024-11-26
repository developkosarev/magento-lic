<?php

namespace Vendor\FontSwitcher\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_USE_CDN = 'fontswitcher/general/use_cdn';

    public function getUseCdn()
    {
        //return $this->scopeConfig->isSetFlag(self::XML_PATH_USE_CDN, ScopeInterface::SCOPE_STORE);
        return true;
    }
}
