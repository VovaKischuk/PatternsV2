<?php

namespace Iterator;

interface StringIterator
{
    public function hasNext(): bool;

    public function getNext(): ?string;
}
