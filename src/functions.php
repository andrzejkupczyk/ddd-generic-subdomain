<?php

declare(strict_types=1);

namespace WebGarden\Model;

use WebGarden\Model\ValueObject\ImmutableValueObject;
use WebGarden\Model\ValueObject\ValueObject;

/**
 * Create a new immutable object using the given value object.
 *
 * @see ValueObject\ImmutableValueObject::__construct()
 */
function immutable(ValueObject $valueObject): ValueObject
{
    return new ImmutableValueObject($valueObject);
}
