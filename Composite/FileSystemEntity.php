<?php

namespace Composite;

interface FileSystemEntity
{
    public function getName(): string;

    public function getSize(): int;
}
