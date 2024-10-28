<?php

use Decorator\InMemoryPersonRepository;
use Decorator\LowerCaseReadPersonDecorator;
use Decorator\Person;
use Decorator\UppercaseWritePersonDecorator;

require_once 'InMemoryPersonRepository.php';
require_once 'LowerCaseReadPersonDecorator.php';
require_once 'UppercaseWritePersonDecorator.php';
require_once 'Person.php';

$baseRepository = new InMemoryPersonRepository();
$writeDecorator = new UppercaseWritePersonDecorator($baseRepository);
$readWriteRepository = new LowerCaseReadPersonDecorator($writeDecorator);

$person1 = new Person("Alice", 130);
$person2 = new Person("Bob", 120);

$readWriteRepository->savePerson($person1);
$readWriteRepository->savePerson($person2);

$people = $readWriteRepository->readPeople();
foreach ($people as $person) {
    echo $person->getName() . " (IQ: " . $person->getIq() . ")\n";
}

$person = $readWriteRepository->readPerson("ALICE");
if ($person) {
    echo "Found: " . $person->getName() . " (IQ: " . $person->getIq() . ")\n";
}
