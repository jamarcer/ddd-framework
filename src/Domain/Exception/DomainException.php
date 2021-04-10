<?php
declare(strict_types=1);

namespace Jamarcer\DDD\Domain\Exception;

abstract class DomainException extends \Exception implements \JsonSerializable
{
}
