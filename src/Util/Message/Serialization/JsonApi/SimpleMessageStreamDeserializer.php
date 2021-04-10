<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization\JsonApi;

use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;
use Jamarcer\DDD\Util\Message\Serialization\Exception\MessageClassNotFoundException;
use Jamarcer\DDD\Util\Message\Serialization\MessageMappingRegistry;
use Jamarcer\DDD\Util\Message\Serialization\SimpleMessageUnserializable;
use Jamarcer\DDD\Util\Message\SimpleMessage;

final class SimpleMessageStreamDeserializer implements SimpleMessageUnserializable
{
    private MessageMappingRegistry $registry;

    public function __construct(MessageMappingRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function unserialize($message): SimpleMessage
    {
        if (false === $message instanceof SimpleMessageStream) {
            throw new \LogicException(self::class . ' only works with ' . SimpleMessageStream::class);
        }

        $messageClass = ($this->registry)($message->messageName());

        if (null === $messageClass || false === \class_exists($messageClass)) {
            throw new MessageClassNotFoundException(\sprintf('Message %s not found', $message->messageName()));
        }

        return $messageClass::fromPayload(
            Uuid::from($message->messageId()),
            \json_decode(
                $message->payload(),
                true,
                512,
                \JSON_THROW_ON_ERROR,
            ),
        );
    }
}
