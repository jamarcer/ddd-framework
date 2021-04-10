<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Util\Message\Serialization\JsonApi;

final class AggregateMessageStream
{
    private string $messageId;
    private string $aggregateId;
    private int $occurredOn;
    private string $messageName;
    private string $payload;
    private int $aggregateVersion;

    public function __construct(
        string $messageId,
        string $aggregateId,
        int $occurredOn,
        string $messageName,
        int $aggregateVersion,
        string $payload
    ) {
        $this->messageId = $messageId;
        $this->aggregateId = $aggregateId;
        $this->occurredOn = $occurredOn;
        $this->messageName = $messageName;
        $this->payload = $payload;
        $this->aggregateVersion = $aggregateVersion;
    }

    public function messageId(): string
    {
        return $this->messageId;
    }

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function occurredOn(): int
    {
        return $this->occurredOn;
    }

    public function messageName(): string
    {
        return $this->messageName;
    }

    public function payload(): string
    {
        return $this->payload;
    }

    public function aggregateVersion(): int
    {
        return $this->aggregateVersion;
    }
}
