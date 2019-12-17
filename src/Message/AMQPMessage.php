<?php declare(strict_types=1);

namespace App\Message;

final class AMQPMessage implements Message
{
    public function getName(): string
    {
        return 'AMQP';
    }
}
