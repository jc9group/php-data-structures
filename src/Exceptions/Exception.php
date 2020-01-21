<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\Exceptions;

class Exception extends \Exception
{
    public static function createFromException(\Exception $exception): self
    {
        return new self($exception->getMessage(), $exception->getCode(), $exception);
    }
}
