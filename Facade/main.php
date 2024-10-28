<?php

use Facade\Person;
use Facade\PersonManager;

require_once 'Person.php';
require_once 'PersonManager.php';

$john = new Person("John", 120);
$jane = new Person("Jane", 130);
$alice = new Person("Alice", 110);

$manager = new PersonManager([$john, $jane, $alice]);

try {
    $smarterPerson = $manager->whoIsTheSmarter("John", "Jane");
    echo $smarterPerson->getName() . " is smarter." . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $manager->transferIq("Jane", "Alice", 10);
    echo "IQ transferred successfully." . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $manager->changeIqByDelta("John", 5);
    echo "John's IQ increased by 5." . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo "John's IQ: " . $john->getIq() . PHP_EOL;
echo "Jane's IQ: " . $jane->getIq() . PHP_EOL;
echo "Alice's IQ: " . $alice->getIq() . PHP_EOL;
