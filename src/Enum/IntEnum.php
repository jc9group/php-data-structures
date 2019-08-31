<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\Enum;

abstract class IntEnum extends Enum
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    public function getValue(): int
    {
        return (int)parent::getValue();
    }
}
