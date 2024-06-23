<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

#[AsCommand(
    name: 'couchdb:database:drop',
    description: 'Drops the database',
)]
class CouchdbDatabaseDropCommand extends Command
{
    public function __construct(
        private readonly HttpClientInterface $couchdbClient,
        #[Autowire('%env(COUCHDB_DB)%')]
        private string $db,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $response = $this->couchdbClient->request(
            'DELETE',
            '/' . $this->db
        );

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            $io->error($response->getContent(false));
            return Command::FAILURE;
        }

        $io->success($response->getContent());

        return Command::SUCCESS;
    }
}
