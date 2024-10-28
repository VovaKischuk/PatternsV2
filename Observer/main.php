<?php

require_once 'FileScanner.php';
require_once 'ObserverInterface.php';
require_once 'WordCounter.php';
require_once 'NumberCounter.php';
require_once 'LongestWordKeeper.php';
require_once 'ReverseWord.php';

use Observer\FileScanner;
use Observer\LongestWordKeeper;
use Observer\NumberCounter;
use Observer\ReverseWord;
use Observer\WordCounter;



$scanner = new FileScanner();

$wordCounter = new WordCounter();
$numberCounter = new NumberCounter();
$longestWordKeeper = new LongestWordKeeper();
$reverseWord = new ReverseWord();

$scanner->registerObserver($wordCounter);
$scanner->registerObserver($numberCounter);
$scanner->registerObserver($longestWordKeeper);
$scanner->registerObserver($reverseWord);

$filePath = 'sample.txt';
$scanner->scan($filePath);

echo "Total Words: " . $wordCounter->getCount() . PHP_EOL;
echo "Total Numbers: " . $numberCounter->getCount() . PHP_EOL;
echo "Longest Word: " . $longestWordKeeper->getLongestWord() . PHP_EOL;
