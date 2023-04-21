<?php

namespace StackOverflow\Domain;

use App\StackOverflow\Domain\Criteria;
use App\StackOverflow\Domain\FromDate;
use App\StackOverflow\Domain\Tags;
use App\StackOverflow\Domain\ToDate;
use PHPUnit\Framework\TestCase;

final class CriteriaTest extends TestCase
{
    public function testItShouldCreateObjectWhenIsCalled()
    {
        $fromDate = FromDate::fromString('1234567890');
        $toDate = ToDate::fromString('1234567890') ;
        $tags = Tags::fromString('java') ;

        $criteria = Criteria::fromParameters(
            $fromDate,
            $toDate,
            $tags,
        );

        $this->assertIsObject($criteria);
    }
}