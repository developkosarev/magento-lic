<?php

declare(strict_types=1);

namespace Diko\CustomerJwt\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Integration\Api\UserTokenIssuerInterface;
use Magento\Integration\Model\CustomUserContext;
use Magento\Integration\Model\UserToken\UserTokenParametersFactory;

//https://magento-lic.local/customerjwt/index/index
class Index implements HttpGetActionInterface
{
    private JsonFactory $jsonFactory;
    private Session $customerSession;
    private CustomerRepositoryInterface $customerRepository;
    private UserTokenParametersFactory $tokenParametersFactory;
    private UserTokenIssuerInterface $tokenIssuer;

    public function __construct(
        JsonFactory $jsonFactory,
        Session $customerSession,
        CustomerRepositoryInterface $customerRepository,
        UserTokenParametersFactory $tokenParamsFactory,
        UserTokenIssuerInterface $tokenIssuer,
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->customerSession = $customerSession;
        $this->customerRepository = $customerRepository;
        $this->tokenParametersFactory = $tokenParamsFactory;
        $this->tokenIssuer = $tokenIssuer;
    }

    /**
     * Get JWT for an authorized customer
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result = $this->jsonFactory->create();

        if (!$this->customerSession->isLoggedIn()) {
            return $result->setData(['error' => true, 'message' => 'Customer not logged in.']);
        }

        $customerId = $this->customerSession->getCustomerId();

        $context = new CustomUserContext(
            (int)$customerId,
            CustomUserContext::USER_TYPE_CUSTOMER
        );
        $params = $this->tokenParametersFactory->create();

        $token = $this->tokenIssuer->create($context, $params);
        return $result->setData(['token' => $token]);
    }

}
