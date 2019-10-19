<?php

declare(strict_types=1);

namespace WebGarden\Model\Entity;

/**
 * Provides methods for a group of associated objects which are considered as one unit
 * with regard to data changes.
 */
interface Aggregate extends Entity
{
    /**
     * Return root of the aggregate.
     *
     * @return \WebGarden\Model\Entity\AggregateRoot
     */
    public function root(): AggregateRoot;
}
