<?php


namespace App\Proposal\Domain\Service\Exception;

use App\Shared\Domain\Exception\WarningException;

final class TagException extends WarningException
{
    public static function empty(): self
    {
        return new self('Tag cannot be empty.', [], 400);
    }
}