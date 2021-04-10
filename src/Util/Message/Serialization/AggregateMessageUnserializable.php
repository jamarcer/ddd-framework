<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization;

use Jamarcer\DDD\Util\Message\AggregateMessage;

interface AggregateMessageUnserializable
{
    public function unserialize($message): AggregateMessage;
}
