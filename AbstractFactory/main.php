<?php

namespace AbstractFactory;

function main(PersonRepositoryFactory $factory): void
{
    $repository = $factory->createRepository();

    $person = new Person("Alice", 30);
    $repository->savePerson($person);

    $people = $repository->readPeople();
    foreach ($people as $p) {
        echo "Name: " . $p->getName() . ", Age: " . $p->getAge() . PHP_EOL;
    }

    $person = $repository->readPerson("Alice");
    if ($person) {
        echo "Found person: " . $person->getName() . PHP_EOL;
    } else {
        echo "Person not found." . PHP_EOL;
    }
}

echo "Choose storage type (1: File, 2: Database): ";
$choice = readline();

if ($choice == "1") {
    $factory = new FilePersonRepositoryFactory();
} elseif ($choice == "2") {
    $pdo = new PDO("sqlite::memory:");
    $pdo->exec("CREATE TABLE people (name TEXT, age INTEGER)");
    $factory = new DatabasePersonRepositoryFactory($pdo);
} else {
    echo "Invalid choice.";
    exit(1);
}

main($factory);
