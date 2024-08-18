<?php

declare(strict_types=1);

namespace Diko\Queue\Controller\Task;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\MessageQueue\PublisherInterface;

class Index implements HttpGetActionInterface
{
    private ResultFactory $resultFactory;

    private PublisherInterface $publisher;

    public function __construct(ResultFactory $resultFactory, PublisherInterface $publisher)
    {
        $this->resultFactory = $resultFactory;
        $this->publisher = $publisher;
    }

    /**
     * route "/queue/task/index"
     * @return Json
     */
    public function execute(): Json
    {
        /** @var Json $jsonResult */
        $jsonResult = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $jsonResult->setData(['message' => 'New task']);

        $this->publisher->publish('diko.queue.reviews', 'test1');

        return $jsonResult;
    }
}
