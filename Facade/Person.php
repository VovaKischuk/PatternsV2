<?php

namespace Facade;

class Person
{
    public function __construct(private readonly string $name, private int $iq)
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

    public function setIq(int $iq): void
    {
        $this->iq = $iq;
    }
}
