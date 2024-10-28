<?php

namespace Observer;

class ReverseWord implements ObserverInterface
{
    public function update(string $word): void
    {
        echo strrev($word) . PHP_EOL;
    }
}
