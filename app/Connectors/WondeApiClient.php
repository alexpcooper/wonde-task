<?php

namespace App\Connectors;

use Wonde\Client;
use App\Exceptions\WondeTimeoutException;

class WondeApiClient
{
    const ERROR_MSG = 'Connection to Wonde API failed: ';

    public $apiClient;

    public function __construct()
    {
        try {
            $this->apiClient = new Client(config('wonde.client_secret'));
        } catch (\Exception $e) {
            throw new WondeTimeoutException(self::ERROR_MSG.$e->getMessage());
        }
    }

    public function getSchools(): array
    {
        $schools = [];

        try {
            foreach ($this->apiClient->schools->all() as $school) {
                $schools[] = $school;
            }
        } catch (\Exception $e) {
            throw new WondeTimeoutException($e->getMessage());
        }

        return $schools;
    }

    public function getEmployeeById(string $schoolId, string $employeeId): \StdClass
    {
        try {
            return $this->apiClient->school($schoolId)->employees->get($employeeId);
        } catch (\Exception $e) {
            throw new WondeTimeoutException(self::ERROR_MSG.$e->getMessage());
        }
    }

    public function getEmployeesBySchool(string $schoolId): array
    {
        $employees = [];

        try {
            foreach ($this->apiClient->school($schoolId)->employees->all() as $employee) {
                $employees[] = $employee;
            }
        } catch (\Exception $e) {
            throw new WondeTimeoutException(self::ERROR_MSG.$e->getMessage());
        }

        return $employees;
    }

    public function getClassesbyEmployeeId(string $schoolId, string $employeeId): array
    {
        $classes = [];
        $students = [];

        try {
            $employee = $this->apiClient->school($schoolId)->employees->get($employeeId, ['include' => 'classes']);

            foreach ($employee->classes->data as $class) {
                
                $timetabledClass = new \StdClass();
                $timetabledClass->id            = $class->id;
                $timetabledClass->name          = $class->name;
                $timetabledClass->code          = $class->code;
                $timetabledClass->description   = $class->description;
                $timetabledClass->subject       = $class->subject;
                $timetabledClass->year_group    = $class->year_group;
                $timetabledClass->academic_year = $class->academic_year;

                $classDetails = $this->apiClient
                    ->school($schoolId)
                    ->classes
                    ->get($class->id, ['include' => 'students']);

                $students = [];
                foreach ($classDetails->students->data as $student) {
                    $attendee = new \StdClass();
                    $attendee->id = $student->id;
                    $attendee->forename = $student->forename;
                    $attendee->surname = $student->surname;
                    $students[] = $attendee;
                }
                usort($students, fn($a, $b) => $a->surname <=> $b->surname);

                $timetabledClass->students = $students;
                $classes[] = $timetabledClass;
            }
        } catch (\Exception $e) {
            throw new WondeTimeoutException(self::ERROR_MSG.$e->getMessage());
        }

        return $classes;
    }
}
