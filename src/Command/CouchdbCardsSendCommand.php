<?php

namespace App\Command;

use App\Repository\CardRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'couchdb:cards:send',
    description: 'Send all cards to CouchDB',
)]
class CouchdbCardsSendCommand extends Command
{
    public function __construct(
        private readonly CardRepository      $cardRepository,
        private readonly HttpClientInterface $couchdbClient,
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title("Send all cards to CouchDB");

        $method = 'PUT';
        $cards = $this->cardRepository->findAll();
        foreach ($cards as $card) {
            $url = '/cards/' . $card->getId();
            $response = $this->couchdbClient->request(
                $method,
                $url,
                [
                    'json' => [
                        '_id' => $card->getId(),
                        'title' => $card->getTitle(),
                    ]
                ]
            );
            if ($response->getStatusCode() !== Response::HTTP_CREATED) {
                $io->error(sprintf(
                    ' %d %s %s',
                    $response->getStatusCode(),
                    $method,
                    $url,
                ));
            } else {
                $io->success(sprintf(
                    ' %d %s %s',
                    $response->getStatusCode(),
                    $method,
                    $url,
                ));
            }
        }

        return Command::SUCCESS;
    }
}
