<?php


namespace App\Shared\Infrastructure\Bus\Query;


use App\Shared\Domain\Bus\Query\QueryBusInterface;
use App\Shared\Domain\Bus\Query\QueryInterface;
use App\Shared\Domain\Bus\Query\Response\ResponseInterface;
use App\Shared\Infrastructure\Bus\Query\Middleware\QueryHandlerMiddleware;
use App\Shared\Infrastructure\Security\Authorization\AuthorizationRepository;

final class QueryBus implements QueryBusInterface
{
    public function __construct(
        private QueryHandlerRepository $queryHandlerRepository
    ) {
    }

    public function ask(QueryInterface $query): ResponseInterface {
        $queryClass = get_class($query);
        $queryHandler = $this->queryHandlerRepository->findByQuery($queryClass);
        $queryHandlerMiddleware = new QueryHandlerMiddleware($queryHandler);

        return $queryHandlerMiddleware->handle($query);
    }
}