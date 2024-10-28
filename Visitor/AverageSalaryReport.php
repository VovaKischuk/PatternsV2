<?php

namespace Visitor;

class AverageSalaryReport implements CompanyReportVisitor
{
    private int $totalSalary = 0;
    private int $employeeCount = 0;

    public function visitEmployee(Employee $employee): void
    {
        $this->totalSalary += $employee->getSalary();
        $this->employeeCount++;
    }

    public function visitCompany(Company $company): void
    {
        $average = $this->employeeCount > 0 ? $this->totalSalary / $this->employeeCount : 0;
        echo "Average Salary in Company '{$company->getName()}': {$average}\n";
    }
}
