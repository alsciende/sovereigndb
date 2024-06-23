<?php

namespace App\Command;

use MongoDB\Client;
use MongoDB\Driver\ServerApi;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

#[AsCommand(
    name: 'mongodb:test',
    description: 'Test connection to MongoDB',
)]
class MongodbTestCommand extends Command
{
    public function __construct(
        #[Autowire('%env(MONGODB_URL)%')]
        private string $connectionString,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $apiVersion = new ServerApi(ServerApi::V1);
        $client = new Client($this->connectionString, [], ['serverApi' => $apiVersion]);
        $client->selectDatabase('admin')->command(['ping' => 1]);

        $io->success('Pinged your deployment. You successfully connected to MongoDB!');

        return Command::SUCCESS;
    }
}
