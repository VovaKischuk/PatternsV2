<?php

use Strategy\DepartmentAscStrategy;
use Strategy\Employee;
use Strategy\EmployeeCollection;
use Strategy\NameAscStrategy;
use Strategy\SalaryDescStrategy;

require_once 'Employee.php';
require_once 'EmployeeCollection.php';
require_once 'ComparisonStrategy.php';
require_once 'DepartmentAscStrategy.php';
require_once 'DepartmentDescStrategy.php';
require_once 'NameAscStrategy.php';
require_once 'NameDescStrategy.php';
require_once 'SalaryAscStrategy.php';
require_once 'SalaryDescStrategy.php';

$employee1 = new Employee("Alice", 5000, "IT");
$employee2 = new Employee("Bob", 4000, "HR");
$employee3 = new Employee("Charlie", 6000, "IT");
$employee4 = new Employee("David", 4500, "Marketing");

$collection = new EmployeeCollection();
$collection->addEmployee($employee1);
$collection->addEmployee($employee2);
$collection->addEmployee($employee3);
$collection->addEmployee($employee4);

echo "Sorted by Name Ascending:\n";
$collection->sort(new NameAscStrategy());
foreach ($collection->getEmployees() as $employee) {
    echo $employee->getName() . "\n";
}

echo "\n";

echo "Sorted by Salary Descending:\n";
$collection->sort(new SalaryDescStrategy());
foreach ($collection->getEmployees() as $employee) {
    echo $employee->getName() . " - " . $employee->getSalary() . "\n";
}

echo "\n";

echo "Sorted by Department Ascending:\n";
$collection->sort(new DepartmentAscStrategy());
foreach ($collection->getEmployees() as $employee) {
    echo $employee->getName() . " - " . $employee->getDepartment() . "\n";
}
