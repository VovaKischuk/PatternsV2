<?php

namespace Singleton;

class Superman
{
    private static ?Superman $instance = null;

    private function __construct()
    {
        echo "Superman has been created!\n";
    }

    public static function getInstance(): Superman
    {
        if (self::$instance === null) {
            self::$instance = new Superman();
        }
        return self::$instance;
    }

    public function sayHello(): void
    {
        echo "Hello, I am Superman!\n";
    }
}
