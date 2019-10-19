<?php

declare(strict_types=1);

namespace WebGarden\Model\Repository;

/**
 * Marks object acting as a storage place for globally accessible objects.
 */
interface Repository extends Adding, Querying, Removing
{
}
