<?php

require_once 'IntegerStackInterface.php';
require_once 'ASCIIStackInterface.php';
require_once 'IntegerStack.php';
require_once 'IntegerStackAdapter.php';

use Adapter\IntegerStack;
use Adapter\IntegerStackAdapter;

$integerStack = new IntegerStack();
$asciiStack = new IntegerStackAdapter($integerStack);

// Push characters onto the ASCII stack
$asciiStack->push('A');
$asciiStack->push('B');
$asciiStack->push('C');

// Pop characters from the ASCII stack
echo $asciiStack->pop() . PHP_EOL;
echo $asciiStack->pop() . PHP_EOL;
echo $asciiStack->pop() . PHP_EOL;

// Attempt to pop from an empty stack
var_dump($asciiStack->pop());
