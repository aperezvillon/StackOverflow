<?php

namespace App\StackOverflow\Application\Query\Response;

use App\Shared\Domain\Bus\Query\Response\ResponseInterface;

final class TopicResponse implements ResponseInterface
{
    public function __construct(
        private readonly string $data
    ) {
    }

    public function data(): string
    {
        return $this->data;
    }
}