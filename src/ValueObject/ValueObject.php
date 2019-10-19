<?php

declare(strict_types=1);

namespace WebGarden\Model\ValueObject;

/**
 * Provides methods needed by an immutable object that have no identity.
 * Implementation should contain attributes of a domain object forming a conceptual whole.
 */
interface ValueObject
{
    /**
     * Return a string representation of the value object.
     *
     * @return string
     */
    public function __toString();

    /**
     * Compare value objects based on their properties and tell whether
     * they can be considered equal.
     *
     * @param mixed $other
     */
    public function sameValueAs($other): bool;
}
