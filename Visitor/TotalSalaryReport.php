<?php

namespace Visitor;

class TotalSalaryReport implements CompanyReportVisitor
{
    private int $totalSalary = 0;

    public function visitEmployee(Employee $employee): void
    {
        $this->totalSalary += $employee->getSalary();
    }

    public function visitCompany(Company $company): void
    {
        echo "Total Salary for Company '{$company->getName()}': {$this->totalSalary}\n";
    }
}
