<?php

namespace App\StackOverflow\Domain;

interface TopicRepositoryInterface
{
    function get(Criteria $parameters): string;
}