<?php

declare(strict_types=1);
namespace Jamarcer\DDD\Tests\Aplication;

use Jamarcer\DDD\Application\Query;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    /**
     * @test
     */
    public function given_query_when_ask_to_get_type_then_return_expected_info()
    {
        $this->assertEquals('query', Query::messageType());
    }
}
