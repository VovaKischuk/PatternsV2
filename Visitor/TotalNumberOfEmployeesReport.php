<?php

namespace Visitor;

class TotalNumberOfEmployeesReport implements CompanyReportVisitor
{
    private int $employeeCount = 0;

    public function visitEmployee(Employee $employee): void
    {
        $this->employeeCount++;
    }

    public function visitCompany(Company $company): void
    {
        echo "Total Employees in Company '{$company->getName()}': {$this->employeeCount}\n";
    }
}
