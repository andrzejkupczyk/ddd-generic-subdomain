<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

use Countable;
use WebGarden\Model\Entity\Entity;
use WebGarden\Model\ValueObject\ValueObject;

/**
 * Represents repository able to query objects.
 */
interface Querying extends Countable
{
    /**
     * Find or reconstitute an aggregate identified with the given identity.
     */
    public function get(ValueObject $identity): ?Entity;
}
