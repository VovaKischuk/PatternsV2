<?php

namespace Composite;

require_once 'FileSystemEntity.php';

class File implements FileSystemEntity
{
    public function __construct(private readonly string $name, private readonly int $size)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
