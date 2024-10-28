<?php

namespace AbstractFactory;

class FilePersonRepositoryFactory implements PersonRepositoryFactory
{
    public function createRepository(): PersonRepository
    {
        return new FilePersonRepository();
    }
}
