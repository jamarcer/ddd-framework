<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization;

use Jamarcer\DDD\Util\Message\SimpleMessage;

interface SimpleMessageSerializable
{
    public function serialize(SimpleMessage $message);
}
