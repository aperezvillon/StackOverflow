<?php

namespace App\StackOverflow\Application\Query\GetTopicsByCriteria;

use App\StackOverflow\Application\Query\Response\TopicResponse;
use App\StackOverflow\Application\Query\Response\TopicResponseConverter;
use App\StackOverflow\Domain\Criteria;
use App\StackOverflow\Domain\Service\TopicFinder;

class FindTopicsUseCase
{
    public function __construct(
        private readonly TopicFinder $topicFinder,
        private readonly TopicResponseConverter $topicResponseConverter,
    ){
    }

    public function __invoke(Criteria $criteria): TopicResponse
    {
        $topics = $this->topicFinder->find($criteria);

        return $this->topicResponseConverter->convert($topics);
    }
}