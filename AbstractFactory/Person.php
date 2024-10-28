<?php

namespace AbstractFactory;

class Person
{
    public function __construct(private readonly string $name, private readonly int $age)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}
