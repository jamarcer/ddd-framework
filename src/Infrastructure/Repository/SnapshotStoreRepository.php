<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Infrastructure\Repository;

use Jamarcer\DDD\Domain\Model\Snapshot;
use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;

interface SnapshotStoreRepository
{
    public function set(Snapshot $snapshot): void;

    public function get(Uuid $aggregateId): ?Snapshot;

    public function remove(Snapshot $snapshot): void;
}
