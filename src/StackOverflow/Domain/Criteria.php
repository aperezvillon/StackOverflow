<?php

namespace App\StackOverflow\Domain;

use App\Shared\Domain\StringValueObject;

final class Criteria
{
    public function __construct(
        private FromDate $fromDate,
        private ToDate   $toDate,
        private Tags     $tags,
    )
    {
    }

    public static function fromParameters(
        FromDate $fromDate,
        ToDate   $toDate,
        Tags     $tags,
    ): self
    {
        return new self(
            $fromDate,
            $toDate,
            $tags
        );
    }

    public function fromDate(): FromDate
    {
        return $this->fromDate;
    }

    public function toDate(): ToDate
    {
        return $this->toDate;
    }

    public function tags(): Tags
    {
        return $this->tags;
    }
}