<?php

namespace App\Domains\Classes;

use App\Connectors\WondeApiClient;
use Illuminate\Support\Facades\Session;

class ClassesService
{
    protected WondeApiClient $apiClient;
    
    public function __construct(WondeApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function get(): array
    {
        $schoolId = config('wonde.school_id');
        $employeeId = Session::get('userId');

        return $this->apiClient->getClassesbyEmployeeId($schoolId, $employeeId);
    }
}
