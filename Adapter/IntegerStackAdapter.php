<?php

namespace Adapter;

use InvalidArgumentException;

class IntegerStackAdapter implements ASCIIStackInterface
{
    public function __construct(private readonly IntegerStackInterface $integerStack)
    {
    }

    public function push(string $char): void
    {
        if (strlen($char) !== 1) {
            throw new InvalidArgumentException("Only single characters are allowed.");
        }

        $asciiValue = ord($char);
        $this->integerStack->push($asciiValue);
    }

    public function pop(): ?string
    {
        try {
            $asciiValue = $this->integerStack->pop();

            return chr($asciiValue);
        } catch (\Exception $e) {
            return null;
        }
    }
}
