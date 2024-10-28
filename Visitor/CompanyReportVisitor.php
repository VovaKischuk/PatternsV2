<?php

namespace Visitor;

interface CompanyReportVisitor
{
    public function visitEmployee(Employee $employee): void;

    public function visitCompany(Company $company): void;
}
