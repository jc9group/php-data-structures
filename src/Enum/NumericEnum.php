<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\Enum;

abstract class NumericEnum extends Enum
{
    public function __construct(float $value)
    {
        parent::__construct($value);
    }

    public function getValue(): float
    {
        return (float)parent::getValue();
    }
    
    public static function isValid($value): bool
    {
        return \in_array($value, static::toArray());
    }
}
