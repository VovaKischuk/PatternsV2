<?php

namespace Observer;

class NumberCounter implements ObserverInterface
{
    private int $count = 0;

    public function update(string $word): void
    {
        if (is_numeric($word)) {
            $this->count++;
        }
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
