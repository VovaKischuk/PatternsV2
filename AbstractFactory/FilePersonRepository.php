<?php

namespace AbstractFactory;

class FilePersonRepository implements PersonRepository
{
    private string $filePath;

    public function __construct(string $filePath = 'people.txt')
    {
        $this->filePath = $filePath;
    }

    public function savePerson(Person $person): void
    {
        $data = json_encode(['name' => $person->getName(), 'age' => $person->getAge()]) . PHP_EOL;
        file_put_contents($this->filePath, $data, FILE_APPEND);
    }

    public function readPeople(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES);
        $people = [];

        foreach ($lines as $line) {
            $data = json_decode($line, true);
            $people[] = new Person($data['name'], $data['age']);
        }

        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        foreach ($this->readPeople() as $person) {
            if ($person->getName() === $name) {
                return $person;
            }
        }
        return null;
    }
}
