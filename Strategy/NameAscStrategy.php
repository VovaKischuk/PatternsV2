<?php

namespace Strategy;

class NameAscStrategy implements ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int
    {
        return strcmp($a->getName(), $b->getName());
    }
}