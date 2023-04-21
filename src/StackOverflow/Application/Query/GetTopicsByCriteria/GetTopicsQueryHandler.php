<?php

namespace App\StackOverflow\Application\Query\GetTopicsByCriteria;

use App\Shared\Domain\Bus\Query\QueryHandlerInterface;
use App\Shared\Domain\Bus\Query\Response\ResponseInterface;
use App\StackOverflow\Domain\Criteria;
use App\StackOverflow\Domain\FromDate;
use App\StackOverflow\Domain\Tags;
use App\StackOverflow\Domain\ToDate;

final class GetTopicsQueryHandler implements QueryHandlerInterface
{
    public function __construct(private readonly FindTopicsUseCase $findTopicsUseCase)
    {
    }

    public function handle(GetTopicsQuery $query): ResponseInterface
    {
        $fromDate = FromDate::fromString($query->fromDate());
        $toDate = ToDate::fromString($query->toDate());
        $tags = Tags::fromString($query->tags());

        $criteria = Criteria::fromParameters(
            $fromDate,
            $toDate,
            $tags
        );

        return $this->findTopicsUseCase->__invoke($criteria);
    }
}