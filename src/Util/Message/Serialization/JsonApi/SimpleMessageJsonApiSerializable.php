<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization\JsonApi;

use Jamarcer\DDD\Util\Message\Serialization\SimpleMessageSerializable;
use Jamarcer\DDD\Util\Message\SimpleMessage;

final class SimpleMessageJsonApiSerializable implements SimpleMessageSerializable
{
    public function serialize(SimpleMessage $message)
    {
        return \json_encode(
            [
                'data' => [
                    'message_id' => $message->messageId(),
                    'type' => $message->messageName(),
                    'attributes' => $message->messagePayload(),
                ],
            ],
            \JSON_THROW_ON_ERROR,
            512,
        );
    }
}
