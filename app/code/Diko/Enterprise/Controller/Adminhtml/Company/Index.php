<?php declare(strict_types=1);

namespace Diko\Enterprise\Controller\Adminhtml\Company;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Diko_Enterprise::company';

    /** @var PageFactory */
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * @return Page
     */
    public function execute(): Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Diko_Enterprise::company');
        $page->getConfig()->getTitle()->prepend(__('Company'));

        return $page;
    }
}
