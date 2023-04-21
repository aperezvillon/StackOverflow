<?php

namespace App\StackOverflow\Application\Query\GetTopicsByCriteria;

use App\Shared\Domain\Bus\Query\QueryInterface;

final class GetTopicsQuery implements QueryInterface
{
    public function __construct(
        private readonly string  $tags,
        private readonly string $fromDate,
        private readonly string $toDate,
    )
    {
    }

    public function tags(): string
    {
        return $this->tags;
    }

    public function fromDate(): string
    {
        return $this->fromDate;
    }

    public function toDate(): string
    {
        return $this->toDate;
    }
}