<?php

declare(strict_types=1);

namespace Jamarcer\DDD\Application\Query;

use Jamarcer\DDD\Util\Message\SimpleMessage;

abstract class Query extends SimpleMessage
{
    final public static function messageType(): string
    {
        return 'query';
    }
}