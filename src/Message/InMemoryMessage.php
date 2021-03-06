<?php declare(strict_types=1);

namespace App\Message;

final class InMemoryMessage implements Message
{
    public function getName(): string
    {
        return 'in-memory';
    }
}
