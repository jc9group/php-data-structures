<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\Enum;

abstract class StringEnum extends Enum
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    public function getValue(): string
    {
        return (string)parent::getValue();
    }
}
