<?php

namespace Strategy;

class DepartmentDescStrategy implements ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int
    {
        return strcmp($b->getDepartment(), $a->getDepartment());
    }
}
