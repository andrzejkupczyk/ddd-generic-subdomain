<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

use WebGarden\Model\Entity\Entity;

/**
 * Represents repository able to add or update objects.
 */
interface Adding
{
    /**
     * Add an aggregate to the repository.
     *
     * @throws \RuntimeException if the repository already contains the aggregate
     */
    public function add(Entity $aggregate): void;

    /**
     * Update an existing aggregate with the specified instance.
     *
     * @throws \RuntimeException if the repository does not contain the aggregate
     */
    public function update(Entity $aggregate): Entity;
}
