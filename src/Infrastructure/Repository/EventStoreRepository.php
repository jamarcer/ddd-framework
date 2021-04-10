<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Infrastructure\Repository;

use Jamarcer\DDD\Domain\Model\DomainEvent;
use Jamarcer\DDD\Domain\Model\ValueObject\DateTimeValueObject;
use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;

interface EventStoreRepository
{
    public function add(DomainEvent ...$events): void;

    public function get(Uuid $aggregateId): array;

    public function getSince(Uuid $aggregateId, DateTimeValueObject $since): array;

    public function getByMessageId(Uuid $messageId): ?DomainEvent;

    public function getByMessageName(string $messageName): array;

    public function getByMessageNameSince(string $messageName, DateTimeValueObject $since): array;
}
