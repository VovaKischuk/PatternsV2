<?php

namespace Decorator;

class Person
{
    public function __construct(private string $name, private readonly int $iq)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIq(): int
    {
        return $this->iq;
    }
}
