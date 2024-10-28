<?php

namespace Proxy;

require_once 'PersonRepository.php';

class CachedPersonRepository implements PersonRepository
{
    private array $cache = [];

    public function __construct(private readonly PersonRepository $repository)
    {
    }

    public function savePerson(Person $person): void
    {
        $this->repository->savePerson($person);
        $this->cache[$person->getName()] = $person;
    }

    public function readPeople(): array
    {
        return $this->repository->readPeople();
    }

    public function readPerson(string $name): ?Person
    {
        if (isset($this->cache[$name])) {
            echo "Cache hit for person: $name\n";
            return $this->cache[$name];
        }

        echo "Cache miss for person: $name\n";
        $person = $this->repository->readPerson($name);

        if ($person !== null) {
            $this->cache[$name] = $person;
        }

        return $person;
    }
}
