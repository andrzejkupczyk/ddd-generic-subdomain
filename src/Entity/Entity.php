<?php

declare(strict_types=1);

namespace WebGarden\Model\Entity;

use WebGarden\Model\ValueObject\ValueObject;

/**
 * Provides methods for a uniquely identifiable object.
 */
interface Entity
{
    /**
     * Return a unique identity of the entity.
     */
    public function identity(): ValueObject;

    /**
     * Compute the equality on the entity's identity.
     *
     * @param \WebGarden\Model\Entity\Entity $entity
     */
    public function sameIdentityAs(self $entity): bool;
}
