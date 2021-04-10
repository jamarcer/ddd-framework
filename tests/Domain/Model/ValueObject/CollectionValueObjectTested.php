<?php

declare(strict_types=1);
namespace Jamarcer\DDD\Tests\Domain\Model\ValueObject;

use Jamarcer\DDD\Domain\Model\ValueObject\CollectionValueObject;

class CollectionValueObjectTested extends CollectionValueObject
{
    public function add($item)
    {
        return $this->addItem($item);
    }

    public function remove($item)
    {
        return $this->removeItem($item);
    }
}
