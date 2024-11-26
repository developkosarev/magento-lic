<?php

namespace Diko\FontSwitcher\Generator;


use Magento\Framework\View\Page\Config\Generator\Head as BaseHead;
use Magento\Framework\View\Page\Config\Structure;

class CustomHead extends BaseHead
{
    protected function processAssets(Structure $pageStructure)
    {
        foreach ($pageStructure->getAssets() as $name => $data) {
            //if (isset($data['src_type'])) {
            //    //
            //}
            //if (isset($data['content_type']) && $data['content_type'] === 'font') {
            //    $data['src_type'] = 'url';
            //}
        }

        return parent::processAssets($pageStructure);
    }
}
