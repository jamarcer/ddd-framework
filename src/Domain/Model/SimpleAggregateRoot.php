<?php declare(strict_types=1);

namespace Jamarcer\DDD\Domain\Model;

use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;
use Jamarcer\DDD\Util\Message\AggregateMessage;

abstract class SimpleAggregateRoot
{
    private Uuid $aggregateId;
    private array $events;

    abstract public static function modelName(): string;

    final protected function __construct(Uuid $aggregateId)
    {
        $this->aggregateId = $aggregateId;
        $this->events = [];
    }

    final public function aggregateId(): Uuid
    {
        return $this->aggregateId;
    }

    final public function events(): array
    {
        return $this->events;
    }

    final protected function recordThat(AggregateMessage $event): void
    {
        $this->events[] = $event;
    }
}
