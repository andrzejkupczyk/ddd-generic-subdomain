<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

use RuntimeException;
use WebGarden\Model\ValueObject\ValueObject;

/**
 * Provides methods for repository that should be able to remove objects.
 */
interface Removing
{
    /**
     * Remove the existing aggregate identified with the given value object.
     *
     * @throws RuntimeException if the repository does not contain the aggregate
     */
    public function remove(ValueObject $identity): void;
}
