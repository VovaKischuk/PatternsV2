<?php

namespace Strategy;

class NameDescStrategy implements ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int
    {
        return strcmp($b->getName(), $a->getName());
    }
}
