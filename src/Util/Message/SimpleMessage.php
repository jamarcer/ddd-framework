<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message;

use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;

abstract class SimpleMessage extends Message
{
    abstract protected function assertPayload(): void;

    final protected function __construct(Uuid $messageId, array $payload)
    {
        parent::__construct($messageId, $payload);
    }

    final public static function fromPayload(Uuid $messageId, array $payload): self
    {
        $message = new static($messageId, $payload);
        $message->assertPayload();

        return $message;
    }

    final public function accept(MessageVisitor $visitor): void
    {
        $visitor->visitSimpleMessage($this);
    }
}
