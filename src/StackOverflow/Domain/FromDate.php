<?php

namespace App\StackOverflow\Domain;

use App\Shared\Domain\StringValueObject;

final class FromDate extends StringValueObject
{
    public function __construct(string $value = "")
    {
        $this->value = $value ?? "";
    }
}