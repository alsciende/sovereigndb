<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'couchdb:database:list',
    description: 'List CouchDB databases',
)]
class CouchdbDatabaseListCommand extends Command
{
    public function __construct(private readonly HttpClientInterface $couchdbClient)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $response = $this->couchdbClient->request(
            'GET',
            '/_all_dbs'
        );

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            $io->error($response->getContent(false));
            return Command::FAILURE;
        }

        $io->success($response->getContent());

        return Command::SUCCESS;
    }
}
