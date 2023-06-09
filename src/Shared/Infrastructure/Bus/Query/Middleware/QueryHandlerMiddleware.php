<?php


namespace App\Shared\Infrastructure\Bus\Query\Middleware;


use App\Shared\Domain\Bus\Query\QueryHandlerInterface;
use App\Shared\Domain\Bus\Query\QueryInterface;
use App\Shared\Domain\Bus\Query\Response\ResponseInterface;
use App\Shared\Domain\Security\Authorization\AuthorizationInterface;

final class QueryHandlerMiddleware extends MiddlewareHandler {
    public function __construct(
        private QueryHandlerInterface $queryHandler
    ) {}

    public function handle(QueryInterface $query): ResponseInterface {
        return $this->queryHandler->handle($query);
    }
}