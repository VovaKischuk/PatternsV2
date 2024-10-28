<?php

use Singleton\Superman;

require_once 'Superman.php';

$superman1 = Superman::getInstance();
$superman1->sayHello();

$superman2 = Superman::getInstance();
$superman2->sayHello();

if ($superman1 === $superman2) {
    echo "Both variables hold the same instance of Superman.\n";
} else {
    echo "Different instances found, which shouldn't happen!\n";
}
