<?php

declare(strict_types=1);

namespace Diko\DeviceSync\Controller\Push;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;
use Diko\DeviceSync\Model\Cache\Type\CustomerData;
use Magento\Framework\App\Cache\TypeListInterface;

class Invalidated implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    private TypeListInterface $cacheTypeList;

    public function __construct(ResultFactory $resultFactory, TypeListInterface $cacheTypeList)
    {
        $this->resultFactory = $resultFactory;
        $this->cacheTypeList = $cacheTypeList;
    }

    public function execute(): Json
    {
        $this->cacheTypeList->invalidate(CustomerData::TYPE_IDENTIFIER);

        /** @var Json $jsonResult */
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $jsonResult->setData(1);

        $types = $this->cacheTypeList->getTypes();
        $jsonResult->setData($types);

        return $jsonResult;
    }
}
