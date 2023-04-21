<?php


namespace App\StackOverflow\Application\Query\Response;


use App\Shared\Domain\Bus\Query\Response\ResponseConverterInterface;

final class TopicResponseConverter implements ResponseConverterInterface
{
    public function convert(string $topic): TopicResponse
    {
        return new TopicResponse(
            $topic
        );
    }
}