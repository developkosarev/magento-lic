<?php declare(strict_types=1);

namespace Diko\Enterprise\Controller\Adminhtml\Company;

use Diko\Enterprise\Model\Company;
use Diko\Enterprise\Model\CompanyFactory;
use Diko\Enterprise\Model\ResourceModel\Company as CompanyResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Delete extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Diko_Enterprise::company_delete';

    /** @var CompanyFactory */
    protected $companyFactory;

    /** @var CompanyResource */
    protected $companyResource;

    public function __construct(Context $context, CompanyFactory $companyFactory, CompanyResource $companyResource)
    {
        $this->companyFactory = $companyFactory;
        $this->companyResource = $companyResource;

        parent::__construct($context);
    }

    public function execute(): Redirect
    {
        $id = $this->getRequest()->getParam('id');
        /** @var Company $company */
        $company = $this->companyFactory->create();
        $this->companyResource->load($company, $id);
        if ($company->getId()) {
            $this->companyResource->delete($company);
            $this->messageManager->addSuccessMessage(__('The record has been deleted.'));
        } else {
            $this->messageManager->addErrorMessage(__('The record does not exist.'));
        }

        /** @var Redirect $redirect */
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $redirect->setPath('*/*');
    }
}
