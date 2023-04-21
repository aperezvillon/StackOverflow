<?php

namespace App\StackOverflow\UI\HTTP\Rest\Controller;

use App\Shared\UI\HTTP\Rest\Controller\ApiRestController;
use App\StackOverflow\Application\Query\GetTopicsByCriteria\GetTopicsQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class GetTopicController extends ApiRestController
{
    public function __invoke(Request $request): JsonResponse
    {
        $command = new GetTopicsQuery(
            $request->get('tags') ?? "",
            $request->get('fromDate') ?? "",
            $request->get('toDate') ?? ""
        );

        try {
            $data = $this->ask($command);
        } catch (\Exception $e) {
            return new JsonResponse(
                $e->getMessage(),
                $e->getCode()
            );
        }

        return new JsonResponse(
            json_decode($data->getContent()),
            $data->getStatusCode(),
            []
        );
    }
}