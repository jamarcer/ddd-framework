<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization;

use Jamarcer\DDD\Util\Message\SimpleMessage;

interface SimpleMessageUnserializable
{
    public function unserialize($message): SimpleMessage;
}
