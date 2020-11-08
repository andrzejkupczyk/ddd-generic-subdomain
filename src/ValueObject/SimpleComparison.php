<?php

declare(strict_types=1);

namespace WebGarden\Model\ValueObject;

/**
 * Provides basic object comparison using the comparison operator (==).
 *
 * @see https://www.php.net/manual/en/language.oop5.object-comparison.php
 * @psalm-immutable
 */
trait SimpleComparison
{
    /**
     * Compare value objects based on their types and values they hold,
     * and tell whether they can be considered equal.
     */
    final public function sameValueAs(ValueObject $other): bool
    {
        if ($other instanceof ImmutableValueObject) {
            $other = $other->unwrap();
        }

        return $this instanceof ImmutableValueObject
            ? $this->unwrap()->sameValueAs($other)
            : $this == $other;
    }
}
