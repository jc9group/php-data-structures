<?php

declare(strict_types=1);

namespace Jc9Group\DataStructures\ValueObjects;

class Email implements \JsonSerializable
{
    /**
     * @var string
     */
    private $address;

    public function __construct(string $address)
    {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid email', $address));
        }

        $this->address = $address;
    }

    public function __toString(): string
    {
        return $this->address;
    }

    public function jsonSerialize(): string
    {
        return $this->address;
    }

    public function isEqual(self $email): bool
    {
        return strtolower((string)$this) === strtolower((string)$email);
    }
}
