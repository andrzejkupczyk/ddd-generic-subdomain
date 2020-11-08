<?php

declare(strict_types=1);

namespace WebGarden\Model\ValueObject;

use BadMethodCallException;
use function DeepCopy\deep_copy;
use LogicException;

/**
 * Proxy class for a value object that acts as a substitute for a real one.
 * Allows to simulate immutability which is not supported natively.
 *
 * @psalm-immutable
 */
final class ImmutableValueObject implements ValueObject
{
    use SimpleComparison;

    private ValueObject $valueObject;

    private bool $initialized = false;

    public function __construct(ValueObject $valueObject)
    {
        if ($this->initialized) {
            throw new LogicException('Value object is already initialized');
        }

        $this->initialized = true;
        $this->valueObject = self::copy($valueObject);
    }

    /**
     * @throws \BadMethodCallException if a callback refers to an undefined method
     *
     * @return mixed
     */
    public function __call(string $name, array $parameters)
    {
        $callback = [$this->valueObject, $name];

        if (is_callable($callback)) {
            return call_user_func_array($callback, $parameters);
        }

        throw new BadMethodCallException("Call to undefined method \"{$name}\"");
    }

    public function __toString(): string
    {
        return (string) $this->valueObject;
    }

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value): void
    {
        $this->warnAboutImmutability();
    }

    public function __unset(string $name): void
    {
        $this->warnAboutImmutability();
    }

    public function unwrap(): ValueObject
    {
        return $this->valueObject;
    }

    private function warnAboutImmutability(): void
    {
        $class = get_class($this->valueObject);

        /** @psalm-suppress ImpureFunctionCall - it is only warning */
        trigger_error(
            "State of the {$class} object is immutable, so it should not be changed",
            E_USER_WARNING
        );
    }

    private static function copy(ValueObject $valueObject): ValueObject
    {
        $copy = function_exists('DeepCopy\deep_copy')
            ? deep_copy($valueObject)
            : clone $valueObject;

        assert($copy instanceof ValueObject);

        return $copy;
    }
}
