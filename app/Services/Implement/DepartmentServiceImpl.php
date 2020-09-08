<?php


namespace App\Services\Implement;


use App\Models\Department;
use App\Services\Contracts\DepartmentService;

class DepartmentServiceImpl implements DepartmentService {

    function create(array $d): int {
        $department = new Department();
        $department->namedept = $d['namedept'];
        $department->save();

        return $department->id;
    }
}
