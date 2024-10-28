<?php

namespace AbstractFactory;

interface PersonRepositoryFactory
{
    public function createRepository(): PersonRepository;
}
