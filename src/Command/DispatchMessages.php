<?php declare(strict_types=1);

namespace App\Command;

use App\Message\AMQPMessage;
use App\Message\DoctrineMessage;
use App\Message\InMemoryMessage;
use App\Message\RedisMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

final class DispatchMessages extends Command
{

    protected static $defaultName = 'messenger:dispatch-message';

    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        parent::__construct(self::$defaultName);

        $this->bus = $bus;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        while (true) {
            $messageType = $io->choice(
                'Dispatch message?',
                [
                    AMQPMessage::class,
                    DoctrineMessage::class,
                    InMemoryMessage::class,
                    RedisMessage::class,
                ]
            );

            $this->bus->dispatch(new $messageType);
        }
    }
}
