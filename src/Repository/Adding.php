<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

use RuntimeException;
use WebGarden\Model\Entity\Aggregate;

/**
 * Provides methods for repository that should be able to add or update objects.
 */
interface Adding
{
    /**
     * Add an aggregate to the repository.
     *
     * @throws RuntimeException if the repository already contains the aggregate
     */
    public function add(Aggregate $aggregate): void;

    /**
     * Update an existing aggregate with the specified instance.
     *
     * @throws RuntimeException if the repository does not contain the aggregate
     */
    public function update(Aggregate $aggregate): Aggregate;
}
