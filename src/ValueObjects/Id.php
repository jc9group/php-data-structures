<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\ValueObjects;

class Id implements \JsonSerializable
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('ID value must not be empty');
        }

        $this->value = $value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function isEqual(self $id): bool
    {
        return (string)$this === (string)$id;
    }
}
