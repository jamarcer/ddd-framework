<?php

declare(strict_types=1);
namespace Jamarcer\DDD\Tests\Util\Message;

use Jamarcer\DDD\Domain\Model\ValueObject\Uuid;
use Jamarcer\DDD\Util\Message\Message;
use Jamarcer\DDD\Util\Message\MessageVisitor;

class MessageTested extends Message
{
    private static $messageName;
    private static $messageVersion;
    private static $messageType;

    public static function set(string $name, string $version, string $type): void
    {
        self::$messageName = $name;
        self::$messageVersion = $version;
        self::$messageType = $type;
    }

    public static function test(Uuid $messageId, array $payload): self
    {
        return new self($messageId, $payload);
    }

    public static function messageName(): string
    {
        return self::$messageName;
    }

    public static function messageVersion(): string
    {
        return self::$messageVersion;
    }

    public static function messageType(): string
    {
        return self::$messageType;
    }

    public function accept(MessageVisitor $visitor): void
    {
        //nothing for this case
    }
}
