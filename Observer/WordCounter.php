<?php

namespace Observer;

class WordCounter implements ObserverInterface
{
    private int $count = 0;

    public function update(string $word): void
    {
        $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
