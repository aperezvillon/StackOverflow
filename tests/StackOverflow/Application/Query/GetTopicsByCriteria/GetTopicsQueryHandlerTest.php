<?php

namespace StackOverflow\Application\Query\GetTopicsByCriteria;

use App\StackOverflow\Application\Query\GetTopicsByCriteria\FindTopicsUseCase;
use App\StackOverflow\Application\Query\GetTopicsByCriteria\GetTopicsQuery;
use App\StackOverflow\Application\Query\GetTopicsByCriteria\GetTopicsQueryHandler;
use App\StackOverflow\Application\Query\Response\TopicResponse;
use App\StackOverflow\Domain\TagException;
use PHPUnit\Framework\TestCase;

final class GetTopicsQueryHandlerTest extends TestCase
{
    public function testItShouldReturnSameObjectWhenTheMethodIsCalled()
    {
        $topicResponse = new TopicResponse("");
        $findTopicUseCase = \Mockery::mock(FindTopicsUseCase::class);
        $findTopicUseCase->shouldReceive('__invoke')->andReturn($topicResponse);
        $handler = new GetTopicsQueryHandler($findTopicUseCase);

        $value = $handler->handle(new GetTopicsQuery(
            'java',
            '',
            ''
        ));

        $this->assertSame($value, $topicResponse);
    }

    public function testItShouldThrowExceptionWhenTagIsEmpty()
    {
        $this->expectException(TagException::class);

        $topicResponse = new TopicResponse("");
        $findTopicUseCase = \Mockery::mock(FindTopicsUseCase::class);
        $findTopicUseCase->shouldReceive('__invoke')->andReturn($topicResponse);
        $handler = new GetTopicsQueryHandler($findTopicUseCase);

        $handler->handle(new GetTopicsQuery(
            '',
            '',
            ''
        ));
    }
}