<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message;

use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;

abstract class Message implements \JsonSerializable
{
    private Uuid $messageId;
    private array $payload;

    abstract public function messageName(): string;

    abstract public static function messageHandledName(): array;

    abstract public static function messageVersion(): string;

    abstract public static function messageType(): string;

    abstract public function accept(MessageVisitor $visitor): void;

    protected function __construct(Uuid $messageId, array $payload)
    {
        $this->assertPrimitivePayload($payload);
        $this->messageId = $messageId;
        $this->payload = $payload;
    }

    public function messageId(): Uuid
    {
        return $this->messageId;
    }

    public function messagePayload(): array
    {
        return $this->payload;
    }

    public function jsonSerialize()
    {
        return [
            'message_id' => $this->messageId(),
            'name' => $this->messageName(),
            'version' => static::messageVersion(),
            'type' => static::messageType(),
            'payload' => $this->messagePayload(),
        ];
    }

    private function assertPrimitivePayload(array &$payload, string $index = 'payload'): void
    {
        \array_walk(
            $payload,
            function ($item, $currentIndex) use ($index) {
                $newIndex = "{$index}.{$currentIndex}";

                if (true === \is_object($item)) {
                    throw new \InvalidArgumentException(
                        \sprintf(
                            'Attribute %s is an object. Payload parameters only can be primitive.',
                            $newIndex,
                        ),
                    );
                }

                if (true !== \is_array($item)) {
                    return;
                }

                $this->assertPrimitivePayload($item, $newIndex);
            },
        );
    }
}
