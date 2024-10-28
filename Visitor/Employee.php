<?php

namespace Visitor;

class Employee
{
    public function __construct(
        public string $name,
        public int $salary,
        public string $department
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

    public function accept(CompanyReportVisitor $visitor): void
    {
        $visitor->visitEmployee($this);
    }
}
