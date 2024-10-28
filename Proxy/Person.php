<?php

namespace Proxy;

class Person
{
    public function __construct(private readonly string $name, private readonly int $iq)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIq(): int
    {
        return $this->iq;
    }
}
