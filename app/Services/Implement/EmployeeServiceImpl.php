<?php


namespace App\Services\Implement;


use App\Models\Employee;
use App\Services\Contracts\EmployeeService;

class EmployeeServiceImpl implements EmployeeService {

    function create(array $e): int {
        $employee = new Employee();
        $employee->first_name = $e['first_name'];
        $employee->surename = $e['surename'];
        $employee->middle_name = $e['middle_name'];
        $employee->department_id = $e['department_id'];
        $employee->workplace_id = $e['workplace_id'];
        $employee->save();

        return $employee->id;
    }
}
