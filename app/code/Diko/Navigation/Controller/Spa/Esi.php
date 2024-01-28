<?php

declare(strict_types=1);

namespace Diko\Navigation\Controller\Spa;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

//https://magento-lic.local/navigation/spa/esi
class Esi implements HttpGetActionInterface
{
    private PageFactory $pageFactory;

    private ResultFactory $resultFactory;

    public function __construct(PageFactory $pageFactory, ResultFactory $resultFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        $result->setHeader('Content-Type', 'text/xml');
        $result->setContents('<root><science></science></root>');

        return $result;
    }
}
