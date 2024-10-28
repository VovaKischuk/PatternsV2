<?php

namespace Visitor;

class Company
{
    private array $employees = [];

    public function __construct(
        private readonly string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function accept(CompanyReportVisitor $visitor): void
    {
        foreach ($this->employees as $employee) {
            $employee->accept($visitor);
        }
        $visitor->visitCompany($this);
    }
}
