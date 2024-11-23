<?php

declare(strict_types=1);

namespace Diko\Queue\Console;

use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\MessageQueue\EnvelopeFactory;
use Magento\Framework\MessageQueue\PublisherInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MessageNewsletterPublishCommand extends Command
{
    private const COMMAND_QUEUE_SEND = 'queue:diko:send';
    private const ARGUMENT_EMAIL = 'email';
    private const ARGUMENT_EMAIL_CODE = 'email_code';
    private PublisherInterface $publisher;
    private SerializerInterface $serializer;
    private EnvelopeFactory $envelopeFactory;


    /**
     * {@inheritdoc}
     */
    public function __construct(
        PublisherInterface $publisher,
        EnvelopeFactory $envelopeFactory,
        SerializerInterface $serializer,
        $name = null
    ) {
        $this->publisher = $publisher;
        $this->envelopeFactory = $envelopeFactory;
        $this->serializer = $serializer;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $topic1 = 'diko.queue.reviews';
        $data1 = ["emailType" => "EMAIL_1", "message" => "message1"];
        $message1 = $this->serializer->serialize($data1);
        $this->publisher->publish($topic1, $message1);


        $email = $input->getArgument(self::ARGUMENT_EMAIL);
        //try {
            $topic2 = 'diko.queue.symfony';
            $message2 = '{"emailType":"EMAIL_2","message":"message2"}';
            //$this->publisher->publish($topic2, $message2);

            $properties = [
                'application_headers' => "EMAIL_2"
            ];
            $envelope2 = $this->envelopeFactory->create(['body' => $message2, 'properties' => $properties]);

            $this->publisher->publish($topic2, $envelope2);

            $output->writeln(sprintf('Published email "%s" to topic "%s"', $email, $topic2));
        //} catch (\Exception $e) {
        //    $output->writeln($e->getMessage());
        //}
    }
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_QUEUE_SEND);
        $this->setDescription('Publish message to a topic');
        $this->setDefinition([
            new InputArgument(
                self::ARGUMENT_EMAIL,
                InputArgument::REQUIRED,
                'Email'
            ),
            new InputArgument(
                self::ARGUMENT_EMAIL_CODE,
                InputArgument::REQUIRED,
                'Email code'
            )
        ]);
        parent::configure();
    }
}
