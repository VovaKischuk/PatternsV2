<?php

namespace Facade;

use Exception;

class PersonManager
{
    public function __construct(private readonly array $persons)
    {
    }

    private function findPersonByName(string $name): Person
    {
        foreach ($this->persons as $person) {
            if ($person->getName() === $name) {
                return $person;
            }
        }
        throw new Exception("Person with name '$name' not found.");
    }

    public function whoIsTheSmarter(string $person1Name, string $person2Name): Person
    {
        $person1 = $this->findPersonByName($person1Name);
        $person2 = $this->findPersonByName($person2Name);

        return ($person1->getIq() >= $person2->getIq()) ? $person1 : $person2;
    }

    public function transferIq(string $fromName, string $toName, int $amountToTransfer): void
    {
        $fromPerson = $this->findPersonByName($fromName);
        $toPerson = $this->findPersonByName($toName);

        if ($fromPerson->getIq() < $amountToTransfer) {
            throw new Exception("Not enough IQ to transfer.");
        }

        $fromPerson->setIq($fromPerson->getIq() - $amountToTransfer);
        $toPerson->setIq($toPerson->getIq() + $amountToTransfer);
    }

    public function changeIqByDelta(string $personName, int $delta): void
    {
        $person = $this->findPersonByName($personName);
        $person->setIq($person->getIq() + $delta);
    }
}
