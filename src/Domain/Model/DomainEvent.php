<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Domain\Model;

use Jamarcer\DDD\Util\Message\AggregateMessage;

abstract class DomainEvent extends AggregateMessage
{
    protected const DEFAULT_SCOPE = 'world';
    protected string $scope;

    final public static function messageType(): string
    {
        return 'domain_event';
    }

    protected function getScope(array $payload): void
    {
        $this->scope = self::DEFAULT_SCOPE;
        if (array_key_exists('scope', $payload)) {
            $this->scope = $payload['scope'];
        }
    }
}
