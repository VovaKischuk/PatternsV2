<?php

namespace Strategy;

class Employee
{
    public function __construct(
        private readonly string $name,
        private readonly int $salary,
        private readonly string $department
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }
}
