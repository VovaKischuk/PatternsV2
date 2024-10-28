<?php

namespace Strategy;

class EmployeeCollection
{
    private array $employees = [];

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function sort(ComparisonStrategy $strategy): void
    {
        usort($this->employees, [$strategy, 'compare']);
    }
}
