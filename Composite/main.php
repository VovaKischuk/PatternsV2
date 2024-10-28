<?php

use Composite\File;
use Composite\Directory;

require_once 'File.php';
require_once 'Directory.php';

// Create some individual files
$file1 = new File("file1.txt", 100);
$file2 = new File("file2.txt", 200);
$file3 = new File("file3.txt", 300);

$root = new Directory("root");
$subDir1 = new Directory("subDir1");
$subDir2 = new Directory("subDir2");

$subDir1->add($file1);
$subDir1->add($file2);

$root->add($subDir1);

$subDir2->add($file3);
$root->add($subDir2);

echo "Contents of root directory: " . implode(", ", $root->listContent()) . PHP_EOL;
echo "Contents of subDir1: " . implode(", ", $subDir1->listContent()) . PHP_EOL;
echo "Size of root directory: " . $root->getSize() . " bytes" . PHP_EOL;
echo "Size of subDir1: " . $subDir1->getSize() . " bytes" . PHP_EOL;
echo "Size of subDir2: " . $subDir2->getSize() . " bytes" . PHP_EOL;

$subDir1->remove($file1);
echo "Contents of subDir1 after removal: " . implode(", ", $subDir1->listContent()) . PHP_EOL;
