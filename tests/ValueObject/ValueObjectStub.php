<?php

declare(strict_types=1);

namespace WebGarden\Model\Tests\ValueObject;

use WebGarden\Model\ValueObject\SimpleComparison;
use WebGarden\Model\ValueObject\ValueObject;

class ValueObjectStub implements ValueObject
{
    use SimpleComparison;

    /** @var mixed */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function value()
    {
        return $this->value;
    }
}
