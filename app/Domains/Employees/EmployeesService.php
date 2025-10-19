<?php

namespace App\Domains\Employees;

use App\Connectors\WondeApiClient;

class EmployeesService
{
    protected WondeApiClient $apiClient;
    
    public function __construct(WondeApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getById(string $employeeId): \StdClass
    {
        return $this->apiClient->getEmployeeById(config('wonde.school_id'), $employeeId);
    }

    public function get(): array
    {
        return $this->apiClient->getEmployeesBySchool(config('wonde.school_id'));
    }
}
