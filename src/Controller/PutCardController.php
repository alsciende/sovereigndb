<?php

namespace App\Controller;

use App\Dto\CardDto;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{Response, Request};
use Symfony\Component\Routing\Attribute\Route;

class PutCardController extends AbstractController implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    #[Route('/cards/{id}', name: 'app_put_card', methods: ['PUT'])]
    public function __invoke(string $id, #[MapRequestPayload] CardDto $cardDto): Response
    {
        
        $this->logger->info('id', [
            'id'=> $id,
            'body'=> $cardDto->id
        ]);

        return $this->json('ok');
    }
}
