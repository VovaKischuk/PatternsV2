<?php

namespace Decorator;

require_once 'PersonRepository.php';

class UppercaseWritePersonDecorator implements PersonRepository
{
    private PersonRepository $wrapped;

    public function __construct(PersonRepository $repository)
    {
        $this->wrapped = $repository;
    }

    public function savePerson(Person $person): void
    {
        $person->setName(strtoupper($person->getName()));
        $this->wrapped->savePerson($person);
    }

    public function readPeople(): array
    {
        return $this->wrapped->readPeople();
    }

    public function readPerson(string $name): ?Person
    {
        return $this->wrapped->readPerson($name);
    }
}
