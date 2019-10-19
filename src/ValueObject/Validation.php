<?php

declare(strict_types=1);

namespace WebGarden\Model\ValueObject;

use Assert\Assert;
use Assert\AssertionChain;

trait Validation
{
    /**
     * Start an assertion chain that is happening on the passed value.
     *
     * @param mixed $value
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function assertThat($value, ?string $assertionClass = null): AssertionChain
    {
        $assertionChain = Assert::that($value);

        if ($assertionClass !== null) {
            $assertionChain->setAssertionClassName($assertionClass);
        }

        return $assertionChain;
    }
}
