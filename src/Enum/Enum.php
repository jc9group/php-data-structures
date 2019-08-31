<?php

declare(strict_types=1);

namespace Jc9\DataStructures\Enum;

abstract class Enum implements \JsonSerializable
{
    protected $value;

    public function __construct($value)
    {
        if ($value instanceof static) {
            $value = $value->getValue();
        }

        if (!static::isValid($value)) {
            throw new \UnexpectedValueException(
                sprintf('Value "%s" is not part of the enum %s', $value, static::class)
            );
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
    
    public function __toString(): string
    {
        return (string)$this->getValue();
    }

    public function equals($variable = null): bool
    {
        return $variable instanceof self
               && $this->getValue() === $variable->getValue()
               && static::class === \get_class($variable);
    }

    public static function keys(): array
    {
        return \array_keys(static::toArray());
    }

    public static function values(): array
    {
        $values = [];

        foreach (static::toArray() as $key => $value) {
            $values[$key] = new static($value);
        }

        return $values;
    }

    protected static $cache = [];

    public static function toArray()
    {
        $class = static::class;

        if (!isset(static::$cache[$class])) {
            try {
                $reflection = new \ReflectionClass($class);
            } catch (\ReflectionException $exception) {
                throw new \RuntimeException($exception->getMessage(), 0, $exception->getCode());
            }
            static::$cache[$class] = $reflection->getConstants();
        }

        return static::$cache[$class];
    }

    public static function isValid($value): bool
    {
        return \in_array($value, static::toArray(), true);
    }
    
    public function jsonSerialize()
    {
        return $this->getValue();
    }
}
