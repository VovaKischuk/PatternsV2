<?php

namespace Strategy;

class DepartmentAscStrategy implements ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int
    {
        return strcmp($a->getDepartment(), $b->getDepartment());
    }
}
