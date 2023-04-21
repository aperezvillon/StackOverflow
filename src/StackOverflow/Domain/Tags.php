<?php

namespace App\StackOverflow\Domain;

use App\Proposal\Domain\Service\Exception\TagException;
use App\Shared\Domain\StringValueObject;

final class Tags extends StringValueObject
{
    public function __construct(string $value)
    {
        if (!$value) {
            throw TagException::empty();
        }

        $this->value = $value;
    }
}