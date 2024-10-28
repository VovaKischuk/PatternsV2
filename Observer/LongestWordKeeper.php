<?php

namespace Observer;

class LongestWordKeeper implements ObserverInterface
{
    private string $longestWord = '';

    public function update(string $word): void
    {
        if (strlen($word) > strlen($this->longestWord)) {
            $this->longestWord = $word;
        }
    }

    public function getLongestWord(): string
    {
        return $this->longestWord;
    }
}
