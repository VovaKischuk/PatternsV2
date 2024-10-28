<?php

namespace Iterator;

use Iterator\StringCollection;

require_once 'StringCollection.php';

class FileStringIterator implements StringIterator
{
    private $fileHandle;
    private ?string $nextLine;

    public function __construct(string $filePath)
    {
        $this->fileHandle = fopen($filePath, 'r');
        $this->nextLine = $this->readNextLine();
    }

    private function readNextLine(): ?string
    {
        return fgets($this->fileHandle) ?: null;
    }

    public function hasNext(): bool
    {
        return $this->nextLine !== null;
    }

    public function getNext(): ?string
    {
        $currentLine = $this->nextLine;
        $this->nextLine = $this->readNextLine();
        return $currentLine;
    }

    public function __destruct()
    {
        fclose($this->fileHandle);
    }
}

class FileStringCollection implements StringCollection
{
    public function __construct(private readonly string $filePath)
    {
    }

    public function getIterator(): StringIterator
    {
        return new FileStringIterator($this->filePath);
    }
}
