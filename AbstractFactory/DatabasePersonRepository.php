<?php

namespace AbstractFactory;

class DatabasePersonRepository implements PersonRepository
{
    public function __construct(private readonly PDO $connection)
    {
    }

    public function savePerson(Person $person): void
    {
        $stmt = $this->connection->prepare("INSERT INTO people (name, age) VALUES (:name, :age)");
        $stmt->execute(['name' => $person->getName(), 'age' => $person->getAge()]);
    }

    public function readPeople(): array
    {
        $stmt = $this->connection->query("SELECT name, age FROM people");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $people = [];
        foreach ($result as $row) {
            $people[] = new Person($row['name'], $row['age']);
        }
        return $people;
    }

    public function readPerson(string $name): ?Person
    {
        $stmt = $this->connection->prepare("SELECT name, age FROM people WHERE name = :name");
        $stmt->execute(['name' => $name]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new Person($data['name'], $data['age']) : null;
    }
}
