<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

use WebGarden\Model\ValueObject\ValueObject;

/**
 * Repository that should be able to remove objects.
 */
interface Removing
{
    /**
     * Remove the existing aggregate identified with the given identity.
     *
     * @throws \RuntimeException if the repository does not contain the aggregate
     */
    public function remove(ValueObject $identity): void;
}
