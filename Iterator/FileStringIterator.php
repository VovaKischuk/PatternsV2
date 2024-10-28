<?php

namespace Iterator;

use Exception;

require_once 'StringCollection.php';

class FileStringIterator implements StringIterator
{
    private $fileHandle;
    private ?string $nextLine;

    public function __construct(string $filePath)
    {
        $this->fileHandle = fopen($filePath, 'r');
        if (!$this->fileHandle) {
            throw new Exception("Unable to open the file: $filePath");
        }
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
        if ($this->fileHandle) {
            fclose($this->fileHandle);
        }
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
