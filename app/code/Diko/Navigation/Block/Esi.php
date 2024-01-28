<?php

declare(strict_types=1);

namespace Diko\Navigation\Block;

use Magento\Framework\View\Element\Template;

class Esi extends Template
{
    public function getEsiUrl()
    {
        return '/navigation/spa/sub';

        //return $this->getUrl('navigation/spa/sub',['_secure' => $this->getRequest()->isSecure()]);
    }
}
