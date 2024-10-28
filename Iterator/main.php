<?php

use Iterator\FileStringCollection;
use Iterator\InMemoryStringCollection;

require_once __DIR__ . '/InMemoryStringCollection.php';
require_once __DIR__ . '/FileStringCollection.php';

// Test InMemoryStringCollection
$inMemoryCollection = new InMemoryStringCollection(["Hello", "World", "PHP", "Iterator"]);
$inMemoryIterator = $inMemoryCollection->getIterator();

echo "In-Memory Collection:\n";
while ($inMemoryIterator->hasNext()) {
    echo $inMemoryIterator->getNext() . "\n";
}

// Test FileStringCollection
echo "\nFile Collection:\n";
$fileCollection = new FileStringCollection(__DIR__ . '/strings.txt');
$fileIterator = $fileCollection->getIterator();

while ($fileIterator->hasNext()) {
    echo $fileIterator->getNext();
}
