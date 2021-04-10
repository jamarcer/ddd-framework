<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization;

use Jamarcer\DDD\Util\Message\AggregateMessage;

interface AggregateMessageSerializable
{
    public function serialize(AggregateMessage $message);
}
