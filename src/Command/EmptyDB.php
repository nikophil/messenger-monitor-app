<?php declare(strict_types=1);

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

final class EmptyDB extends Command
{
    protected static $defaultName = 'messenger:empty-db';

    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;

        parent::__construct(self::$defaultName);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $this->connection->executeQuery('DROP TABLE IF EXISTS messenger_monitor;');
        $this->connection->executeQuery('DROP TABLE IF EXISTS messenger_messages;');

        $io->success('DB correctly emptied!');

        return 0;
    }
}
