<?php

declare(strict_types=1);

namespace Diko\VueSpa\Controller\Spa;

use Diko\VueSpa\Service\OptionsFactoryInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

//https://magento-lic.local/vuespa/spa/index
class Index implements HttpGetActionInterface
{
    private PageFactory $pageFactory;
    private OptionsFactoryInterface $optionsFactory;

    public function __construct(PageFactory $pageFactory, OptionsFactoryInterface $optionsFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->optionsFactory = $optionsFactory;
    }

    public function execute(): Page
    {
        $option = $this->optionsFactory->create(1);
        echo "<pre>";
        var_dump($this->optionsFactory);
        //var_dump($option);
        echo "</pre>";

        return $this->pageFactory->create();
    }
}
