<?php declare(strict_types=1);

namespace App\Message;

final class RedisMessage implements Message
{
    public function getName(): string
    {
        return 'Redis';
    }
}
