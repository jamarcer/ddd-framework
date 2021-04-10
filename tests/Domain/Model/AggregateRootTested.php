<?php

declare(strict_types=1);
namespace Jamarcer\DDD\Tests\Domain\Model;

use Jamarcer\DDD\Domain\Model\AggregateRoot;
use Jamarcer\DDD\Domain\Model\DomainEvent;
use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;

class AggregateRootTested extends AggregateRoot
{
    private $applyDomainEventTestedEvent;

    public static function test(Uuid $aggregateId, int $aggregateVersion): self
    {
        return new self($aggregateId, $aggregateVersion);
    }

    public static function modelName(): string
    {
        return 'example';
    }

    public function jsonSerialize()
    {
        return null;
    }

    public function doAction(DomainEvent $event): void
    {
        $this->recordThat($event);
    }

    public function applyDomainEventTested(DomainEventTested $event): void
    {
        $this->applyDomainEventTestedEvent = $event;
    }

    public function applyDomainEventTestedEvent(): DomainEvent
    {
        return $this->applyDomainEventTestedEvent;
    }
}
