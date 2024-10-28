<?php

use Visitor\AverageSalaryReport;
use Visitor\Company;
use Visitor\Employee;
use Visitor\NumberOfEmployeesPerDepartmentReport;
use Visitor\TotalNumberOfEmployeesReport;
use Visitor\TotalSalaryReport;

require_once 'Employee.php';
require_once 'Company.php';
require_once 'CompanyReportVisitor.php';
require_once 'TotalSalaryReport.php';
require_once 'TotalNumberOfEmployeesReport.php';
require_once 'AverageSalaryReport.php';
require_once 'NumberOfEmployeesPerDepartmentReport.php';

$company = new Company("TechCorp");

$company->addEmployee(new Employee("Alice", 5000, "IT"));
$company->addEmployee(new Employee("Bob", 4500, "HR"));
$company->addEmployee(new Employee("Charlie", 6000, "IT"));
$company->addEmployee(new Employee("David", 4000, "Marketing"));

echo "Reports:\n";

$totalSalaryReport = new TotalSalaryReport();
$company->accept($totalSalaryReport);

echo "\n";

$totalEmployeesReport = new TotalNumberOfEmployeesReport();
$company->accept($totalEmployeesReport);

echo "\n";

$averageSalaryReport = new AverageSalaryReport();
$company->accept($averageSalaryReport);

echo "\n";

$employeesPerDeptReport = new NumberOfEmployeesPerDepartmentReport();
$company->accept($employeesPerDeptReport);
