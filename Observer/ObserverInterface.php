<?php

namespace Observer;

interface ObserverInterface
{
    public function update(string $word): void;
}
