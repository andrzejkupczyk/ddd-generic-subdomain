<?php

declare(strict_types=1);

namespace WebGarden\Model\ValueObject;

trait Comparability
{
    /**
     * Compare value objects based on their types and string representations
     * and tell whether they can be considered equal.
     *
     * @param mixed $other
     */
    public function sameValueAs($other): bool
    {
        return $other instanceof $this && (string) $this === (string) $other;
    }
}
