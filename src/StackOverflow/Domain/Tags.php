<?php

namespace App\StackOverflow\Domain;

use App\Shared\Domain\StringValueObject;

final class Tags extends StringValueObject
{
    /**
     * @throws TagException
     */
    public function __construct(string $value)
    {
        if (!$value) {
            throw TagException::empty();
        }

        $this->value = $value;
    }
}