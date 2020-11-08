<?php

declare(strict_types=1);

namespace WebGarden\Model\Entity;

use WebGarden\Model\ValueObject\ValueObject;

/**
 * Represents a uniquely identifiable object.
 */
interface Entity
{
    /**
     * Return a unique identity of the entity.
     */
    public function identity(): ValueObject;

    /**
     * Compute the equality on the entity's identity.
     */
    public function sameIdentityAs(self $entity): bool;
}
