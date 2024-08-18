<?php
declare(strict_types=1);

namespace Diko\Queue\Model\Queue;

use Psr\Log\LoggerInterface;

class Consumer
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function process(string $message): void
    {
        echo 'Message received: ' . $message . PHP_EOL;

        $this->logger->info($message);
    }

}
