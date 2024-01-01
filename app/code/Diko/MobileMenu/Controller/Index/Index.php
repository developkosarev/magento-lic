<?php

declare(strict_types=1);

namespace Diko\MobileMenu\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

//https://magento-lic.local/mobilemenu/index/index
class Index implements HttpGetActionInterface
{
    private PageFactory $pageFactory;

    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    public function execute(): Page
    {
        return $this->pageFactory->create();
    }
}
