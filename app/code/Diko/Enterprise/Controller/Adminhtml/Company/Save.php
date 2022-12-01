<?php
declare(strict_types=1);

namespace Diko\Enterprise\Controller\Adminhtml\Company;

use Diko\Enterprise\Model\Company;
use Diko\Enterprise\Model\CompanyFactory;
use Diko\Enterprise\Model\ResourceModel\Company as CompanyResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

class Save extends Action implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Diko_Enterprise::company_delete';

    /** @var CompanyFactory */
    private CompanyFactory $companyFactory;

    /** @var CompanyResource */
    private CompanyResource $companyResource;

    /**
     * @param Context $context
     * @param CompanyFactory $companyFactory
     * @param CompanyResource $companyResource
     */
    public function __construct(
        Context $context,
        CompanyFactory $companyFactory,
        CompanyResource $companyResource
    ) {
        $this->companyFactory = $companyFactory;
        $this->companyResource = $companyResource;
        parent::__construct($context);
    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $post = $this->getRequest()->getPost();
        $isExistingPost = $post->id;
        /** @var Company $company */
        $company = $this->companyFactory->create();
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if ($isExistingPost) {
            //echo "<pre>";
            //print_r($post);
            //die("dead");

            try {
                $this->companyResource->load($company, $post->id);
                if (!$company->getData('id')) {
                    throw new NotFoundException(__('This record no longer exists.'));
                }
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $redirect->setPath('*/*/');
            }
        } else {
            // If new, build an object with the posted data to save it
            unset($post->id);
        }

        $company->setData(array_merge($company->getData(), $post->toArray()));

        try {
            $this->companyResource->save($company);
            $this->messageManager->addSuccessMessage(__('The record has been saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('There was a problem saving the record.'));
            return $redirect->setPath('*/*/');
        }

        // On success, redirect back to the admin grid
        return $redirect->setPath('*/*/index');
    }
}
