<?php

namespace StackOverflow\UI\HTTP\Rest\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class GetTopicControllerTest extends WebTestCase
{
    public function testItShouldReturnAJsonWhenTheClassIsCalled()
    {
        $client = static::createClient();
        $router = $client->getContainer()->get('router');

        $client->request('GET', $router->generate('api_get_topics', [
            'tags' => 'java'
        ]));

        $response = $client->getResponse()->getContent();

        $this->assertJson($response);

    }
}
