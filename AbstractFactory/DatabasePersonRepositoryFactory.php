<?php

namespace AbstractFactory;

class DatabasePersonRepositoryFactory implements PersonRepositoryFactory
{
    public function __construct(private readonly PDO $connection)
    {
    }

    public function createRepository(): PersonRepository
    {
        return new DatabasePersonRepository($this->connection);
    }
}
