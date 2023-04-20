<?php
declare(strict_types=1);

namespace Diko\OrderAttributes\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    private PageFactory $pageFactory;

    private ManagerInterface $messageManager;

    public function __construct(PageFactory $pageFactory, ManagerInterface $messageManager)
    {
        $this->pageFactory = $pageFactory;
        $this->messageManager = $messageManager;
    }

    //public function execute()
    //{
    //    die('index about us 1');
    //}

    public function execute(): Page
    {
        $this->messageManager->addSuccessMessage(__('The record has been deleted.'));
        $this->messageManager->addErrorMessage(__('The record does not exist.'));

        return $this->pageFactory->create();
    }
}
