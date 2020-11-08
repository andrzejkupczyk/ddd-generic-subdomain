<?php

declare(strict_types=1);

namespace WebGarden\Model\ValueObject;

/**
 * Represents an immutable object that have no identity.
 * Implementation should contain attributes of a domain object forming
 * a conceptual whole.
 *
 * @psalm-immutable
 */
interface ValueObject
{
    /**
     * Return a string representation of the value object.
     */
    public function __toString(): string;

    /**
     * Compare value objects based on their types and values they hold,
     * and tell whether they can be considered equal.
     */
    public function sameValueAs(ValueObject $other): bool;
}
