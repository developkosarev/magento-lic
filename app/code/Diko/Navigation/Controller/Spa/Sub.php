<?php

declare(strict_types=1);

namespace Diko\Navigation\Controller\Spa;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

//https://magento-lic.local/navigation/spa/sub
class Sub implements HttpGetActionInterface
{
    private PageFactory $pageFactory;

    private ResultFactory $resultFactory;

    public function __construct(PageFactory $pageFactory, ResultFactory $resultFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute() //: Page
    {
        return $this->pageFactory->create();
        //return $this->resultFactory->create(ResultFactory::TYPE_LAYOUT);
    }
}
