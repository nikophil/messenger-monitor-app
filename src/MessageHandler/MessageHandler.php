<?php declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\Message;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class MessageHandler implements MessageHandlerInterface
{
    public function __invoke(Message $message)
    {
        if (rand(0, 10) > 5) {
            throw new \RuntimeException('Ooops');
        }

        dump($message->getName().' handled.');
    }
}
