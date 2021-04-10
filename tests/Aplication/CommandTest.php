<?php

declare(strict_types=1);
namespace Jamarcer\DDD\Tests\Aplication;

use Jamarcer\DDD\Application\Command;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    /**
     * @test
     */
    public function given_command_when_ask_to_get_type_then_return_expected_info()
    {
        $this->assertEquals('command', Command::messageType());
    }
}
