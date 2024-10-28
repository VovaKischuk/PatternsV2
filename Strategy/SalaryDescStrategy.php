<?php

namespace Strategy;

class SalaryDescStrategy implements ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int
    {
        return $b->getSalary() - $a->getSalary();
    }
}