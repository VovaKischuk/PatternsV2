<?php

namespace Adapter;

interface ASCIIStackInterface
{
    public function push(string $char): void;

    public function pop(): ?string;
}
