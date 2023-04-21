<?php

namespace App\StackOverflow\Infrastructure\Service\StackExchange;

use App\StackOverflow\Domain\Criteria;
use App\StackOVerflow\Domain\TopicRepositoryInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class StackExchangeApi implements TopicRepositoryInterface
{
    CONST SITE_NAME = 'stackoverflow';

    private string $uri;

    public function __construct(private HttpClientInterface $client)
    {
        $this->uri = $_ENV['STACK_EXCHANGE_URL'];
    }

    public function get(Criteria $parameters): string
    {
        $response = $this->client->request('GET', $this->uri, [
            'query' => [
                'fromdate' => $parameters->fromDate()->value(),
                'todate' => $parameters->toDate()->value(),
                'tagged' => $parameters->tags()->value(),
                'site' => self::SITE_NAME
            ]
        ]);

        return $response->getContent();
    }
}
