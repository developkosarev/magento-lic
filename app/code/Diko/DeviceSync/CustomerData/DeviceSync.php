<?php

declare(strict_types=1);

namespace Diko\DeviceSync\CustomerData;

use DateTime;
use Magento\Authorization\Model\UserContextInterface;
use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Integration\Api\UserTokenIssuerInterface;
use Magento\Integration\Model\CustomUserContext;
use Magento\Integration\Model\UserToken\UserTokenParametersFactory;

class DeviceSync implements SectionSourceInterface
{
    /** @var CurrentCustomer */
    private CurrentCustomer $currentCustomer;

    /** @var UserTokenIssuerInterface */
    private UserTokenIssuerInterface $tokenIssuer;

    /** @var UserTokenParametersFactory */
    private UserTokenParametersFactory $tokenParametersFactory;

    public function __construct(
        CurrentCustomer $currentCustomer,
        UserTokenIssuerInterface $tokenIssuer,
        UserTokenParametersFactory $tokenParamsFactory,
    ) {
        $this->currentCustomer = $currentCustomer;
        $this->tokenParametersFactory = $tokenParamsFactory;
        $this->tokenIssuer = $tokenIssuer;
    }

    /**
     * @inheritdoc
     */
    public function getSectionData(): array
    {
        $customerId = $this->currentCustomer->getCustomerId();

        if (!$customerId) {
            return [];
        }

        $now = new DateTime();

        $context = new CustomUserContext((int)$customerId, UserContextInterface::USER_TYPE_CUSTOMER);
        $params = $this->tokenParametersFactory->create();
        $token = $this->tokenIssuer->create($context, $params);

        return [
            'now' => $now->format('Y-m-d H:i:s'),
            'updateCustomer' => false,
            'updateCart' => false,
            'token' => $token
        ];
    }
}
