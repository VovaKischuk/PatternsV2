<?php

namespace Decorator;

require_once 'PersonRepository.php';

class LowerCaseReadPersonDecorator implements PersonRepository
{
    private PersonRepository $wrapped;

    public function __construct(PersonRepository $repository)
    {
        $this->wrapped = $repository;
    }

    public function savePerson(Person $person): void
    {
        $this->wrapped->savePerson($person);
    }

    public function readPeople(): array
    {
        $people = $this->wrapped->readPeople();
        foreach ($people as $person) {
            $person->setName(strtolower($person->getName()));
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $person = $this->wrapped->readPerson($name);
        if ($person) {
            $person->setName(strtolower($person->getName()));
        }

        return $person;
    }
}
