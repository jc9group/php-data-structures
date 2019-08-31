<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\Enum;

abstract class BoolEnum extends Enum
{
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }

    public function getValue(): bool
    {
        return (bool)parent::getValue();
    }
    
    public function jsonSerialize()
    {
        return $this->__toString();
    }
    
    public function __toString(): string
    {
        return $this->getValue() ? 'true' : 'false';
    }
}
