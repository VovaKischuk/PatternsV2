<?php

namespace Composite;

require_once 'FileSystemEntity.php';

class Directory implements FileSystemEntity
{
    private array $contents = [];

    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        $totalSize = 0;
        foreach ($this->contents as $entity) {
            $totalSize += $entity->getSize();
        }
        return $totalSize;
    }

    public function add(FileSystemEntity $fsEntity): void
    {
        $this->contents[] = $fsEntity;
    }

    public function remove(FileSystemEntity $fsEntity): void
    {
        foreach ($this->contents as $key => $entity) {
            if ($entity === $fsEntity) {
                unset($this->contents[$key]);
                return;
            }
        }
    }

    public function listContent(): array
    {
        $names = [];
        foreach ($this->contents as $entity) {
            $names[] = $entity->getName();
        }

        return $names;
    }
}
