<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization\JsonApi;

use Jamarcer\DDD\Domain\Model\ValueObject\DateTimeValueObject;
use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;
use Jamarcer\DDD\Util\Message\AggregateMessage;
use Jamarcer\DDD\Util\Message\Serialization\AggregateMessageUnserializable;
use Jamarcer\DDD\Util\Message\Serialization\Exception\MessageClassNotFoundException;
use Jamarcer\DDD\Util\Message\Serialization\MessageMappingRegistry;

final class AggregateMessageStreamDeserializer implements AggregateMessageUnserializable
{
    private MessageMappingRegistry $registry;

    public function __construct(MessageMappingRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function unserialize($message): AggregateMessage
    {
        if (false === $message instanceof AggregateMessageStream) {
            throw new \LogicException(self::class . ' only works with ' . AggregateMessageStream::class);
        }

        $eventClass = ($this->registry)($message->messageName());

        if (null === $eventClass || false === \class_exists($eventClass)) {
            throw new MessageClassNotFoundException(\sprintf('Message %s not found', $message->messageName()));
        }

        return $eventClass::fromPayload(
            Uuid::from($message->messageId()),
            Uuid::from($message->aggregateId()),
            DateTimeValueObject::fromTimestamp($message->occurredOn()),
            \json_decode($message->payload(), true, 512, \JSON_THROW_ON_ERROR),
            $message->aggregateVersion(),
        );
    }
}
