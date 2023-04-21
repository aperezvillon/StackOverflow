<?php


namespace App\Shared\UI\HTTP\Rest\Controller;


use App\Shared\Domain\Bus\Query\QueryBusInterface;
use App\Shared\Domain\Bus\Query\QueryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiRestController extends AbstractController
{
    public function __construct(
        private readonly QueryBusInterface $queryBus
    ) {
    }

    protected function ask(QueryInterface $query): JsonResponse
    {
        $response = $this->queryBus->ask($query);

        return new JsonResponse(json_decode($response->data()), JsonResponse::HTTP_OK);
    }
}