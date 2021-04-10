<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Domain\Model;

use Jamarcer\DDD\Util\Message\AggregateMessage;

abstract class DomainEvent extends AggregateMessage
{
    final public static function messageType(): string
    {
        return 'domain_event';
    }
}
