<?php

declare(strict_types=1);

namespace Diko\FontSwitcher\Block;

use Magento\Framework\View\Element\Template;

class Head extends Template
{
    /**
     * @var \Magento\Framework\View\Asset\Repository
     */
    protected $assetRepository;

    /**
     * Header constructor.
     * @param Template\Context $context
     * @param \Magento\Framework\View\Page\Config $pageConfig
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        \Magento\Framework\View\Page\Config $pageConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->pageConfig = $pageConfig;
        $this->manageScripts();
    }

    /**
     * @return void
     */
    public function manageScripts()
    {
        // additional attributes goes here
        //$attributes = [];
        //$this->pageConfig->addRemotePageAsset(
        //    "https://www.test.com/js?client-id=xyz",
        //    'js',
        //    $attributes
        //);
        //$this->pageConfig->addRemotePageAsset(
        //    "https://static-v1.xxx.com/static/version1/theme-xxx/fonts/JosefinSans/josefin-sans-v23-latin-ext_latin-100.woff2",
        //    'woff2',
        //    $attributes
        //);
        //$this->pageConfig->addRemotePageAsset(
        //    "https://static.xxx.com/static/version1/theme-xxx/fonts/JosefinSans/josefin-sans-v23-latin-ext_latin-100.woff2",
        //    'font',
        //    ['rel' => 'preload', 'as' =>'font', 'crossorigin' => 'anonymous']
        //);
        //$this->pageConfig->addPageAsset(
        //    "https://www.test.com/fonts/JosefinSans/josefin-sans-v23-latin-ext_latin-100.woff2",
        //    $attributes,
        //    'font'
        //);
    }
}
