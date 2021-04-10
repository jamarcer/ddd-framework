<?php

declare(strict_types=1);

namespace Jamarcer\DDD\Application\Command;

use Jamarcer\DDD\Util\Message\SimpleMessage;

abstract class Command extends SimpleMessage
{
    final public static function messageType(): string
    {
        return 'command';
    }
}