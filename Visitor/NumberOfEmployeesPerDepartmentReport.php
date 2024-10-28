<?php

namespace Visitor;

class NumberOfEmployeesPerDepartmentReport implements CompanyReportVisitor
{
    private array $departmentCount = [];

    public function visitEmployee(Employee $employee): void
    {
        $department = $employee->getDepartment();
        if (!isset($this->departmentCount[$department])) {
            $this->departmentCount[$department] = 0;
        }
        $this->departmentCount[$department]++;
    }

    public function visitCompany(Company $company): void
    {
        echo "Employees per Department in Company '{$company->getName()}':\n";
        foreach ($this->departmentCount as $department => $count) {
            echo "- $department: $count\n";
        }
    }
}
