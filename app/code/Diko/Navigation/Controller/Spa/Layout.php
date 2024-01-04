<?php

declare(strict_types=1);

namespace Diko\Navigation\Controller\Spa;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\LayoutFactory;

//https://magento-lic.local/navigation/spa/layout
class Layout implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;
    private LayoutFactory $layoutFactory;

    public function __construct(ResultFactory $resultFactory, LayoutFactory $layoutFactory)
    {
        $this->resultFactory = $resultFactory;
        $this->layoutFactory = $layoutFactory;
    }

    public function execute() //: Page
    {
        //$result = $this->layoutFactory->create();
        //echo "<pre>";
        //var_dump($result);
        //echo "</pre>";

        //$result = $this->resultFactory->create(ResultFactory::TYPE_LAYOUT);
        //echo "<pre>";
        //var_dump($result);
        //echo "</pre>";

        return $this->resultFactory->create(ResultFactory::TYPE_LAYOUT);
    }
}
