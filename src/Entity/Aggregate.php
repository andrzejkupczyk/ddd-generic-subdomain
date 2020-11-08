<?php

declare(strict_types=1);

namespace WebGarden\Model\Entity;

/**
 * Represents a group of associated objects (entities and value objects)
 * which are considered as one unit with regard to data changes.
 *
 * @see https://martinfowler.com/bliki/DDD_Aggregate.html
 * @see https://www.dddcommunity.org/library/vernon_2011/
 * @see https://lostechies.com/gabrielschenker/2015/05/25/ddd-the-aggregate/
 */
interface Aggregate extends Entity
{
    /**
     * Return root of the aggregate.
     *
     * @return \WebGarden\Model\Entity\Entity
     */
    public function root(): Entity;
}
