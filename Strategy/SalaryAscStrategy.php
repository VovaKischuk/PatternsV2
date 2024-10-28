<?php

namespace Strategy;

class SalaryAscStrategy implements ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int
    {
        return $a->getSalary() - $b->getSalary();
    }
}
