<?php

namespace App\StackOverflow\Domain;

use App\Shared\Domain\StringValueObject;

final class ToDate extends StringValueObject
{
    public function __construct(string $value = "")
    {
        $this->value = $value ?? "";
    }
}