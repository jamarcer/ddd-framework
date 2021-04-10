<?php declare(strict_types=1);

namespace Jamarcer\DDD\Tests\Domain\Model;

use Jamarcer\DDD\Domain\Model\SimpleAggregateRoot;
use Jamarcer\DDD\Domain\Model\ValueObject\DateTimeValueObject;
use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;

final class SimpleAggregateRootTested extends SimpleAggregateRoot
{
    public static function test(Uuid $aggregateId): self
    {
        $self = new self($aggregateId);

        $self->recordThat(
            DomainEventTested::fromPayload(
                Uuid::v4(),
                $aggregateId,
                new DateTimeValueObject(),
                []
            )
        );

        return $self;
    }

    public static function modelName(): string
    {
        return 'foo';
    }
}
