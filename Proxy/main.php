<?php

use Proxy\CachedPersonRepository;
use Proxy\InMemoryPersonRepository;
use Proxy\Person;

require_once 'InMemoryPersonRepository.php';
require_once 'CachedPersonRepository.php';
require_once 'Person.php';

$repository = new InMemoryPersonRepository();
$cachedRepository = new CachedPersonRepository($repository);

$person1 = new Person("Alice", 120);
$person2 = new Person("Bob", 110);

$cachedRepository->savePerson($person1);
$cachedRepository->savePerson($person2);

echo $cachedRepository->readPerson("Alice")->getName() . "\n";
echo $cachedRepository->readPerson("Alice")->getName() . "\n";

echo $cachedRepository->readPerson("Bob")->getName() . "\n";
echo $cachedRepository->readPerson("Bob")->getName() . "\n";

echo $cachedRepository->readPerson("Charlie") === null ? "Charlie not found\n" : "";
