<?php

declare(strict_types=1);

namespace Diko\Queue\Controller\Task;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;

class Index implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    public function execute(): Json
    {
        /** @var Json $jsonResult */
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $jsonResult->setData(['message' => 'New task']);

        return $jsonResult;
    }
}
