<?php declare(strict_types=1);

namespace App\Message;

final class DoctrineMessage implements Message
{
    public function getName(): string
    {
        return 'Doctrine';
    }

}
