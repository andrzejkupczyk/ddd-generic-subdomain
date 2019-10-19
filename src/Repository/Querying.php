<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

use WebGarden\Model\Entity\Aggregate;
use WebGarden\Model\ValueObject\ValueObject;

/**
 * Provides methods for repository that should be able to query objects.
 */
interface Querying
{
    /**
     * Find or reconstitute an aggregate identified with the given value object.
     */
    public function get(ValueObject $identity): ?Aggregate;
}
