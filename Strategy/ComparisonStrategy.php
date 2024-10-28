<?php

namespace Strategy;

interface ComparisonStrategy
{
    public function compare(Employee $a, Employee $b): int;
}
