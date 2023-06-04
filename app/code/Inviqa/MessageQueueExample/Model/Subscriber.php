<?php

namespace Inviqa\MessageQueueExample\Model;

use Inviqa\MessageQueueExample\Logger\Logger;
use Inviqa\MessageQueueExample\Api\MessageInterface;
use Inviqa\MessageQueueExample\Api\SubscriberInterface;

class Subscriber implements SubscriberInterface
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function processMessage(MessageInterface $message)
    {
        echo 'Message received: ' . $message->getMessage() . PHP_EOL;

        $this->logger->info($message->getMessage());
    }
}
