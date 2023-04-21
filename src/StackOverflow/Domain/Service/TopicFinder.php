<?php

namespace App\StackOverflow\Domain\Service;

use App\StackOverflow\Domain\Criteria;
use App\StackOverflow\Domain\TopicRepositoryInterface;
use App\StackOverflow\Infrastructure\Service\StackExchange\StackExchangeApi;

final class TopicFinder
{
    public function __construct(
        private readonly StackExchangeApi $topicRepository,
    ){
    }

    public function find(Criteria $parameters): string
    {
        return $this->topicRepository->get($parameters);
    }
}