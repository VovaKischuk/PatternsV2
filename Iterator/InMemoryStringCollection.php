<?php

namespace Iterator;

require_once 'StringCollection.php';

class InMemoryStringIterator implements StringIterator
{
    private array $strings;
    private int $position = 0;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function hasNext(): bool
    {
        return $this->position < count($this->strings);
    }

    public function getNext(): ?string
    {
        if (!$this->hasNext()) {
            return null;
        }
        return $this->strings[$this->position++];
    }
}

class InMemoryStringCollection implements StringCollection
{
    private array $strings;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function getIterator(): StringIterator
    {
        return new InMemoryStringIterator($this->strings);
    }
}
