<?php


namespace App\Services\Contracts;


interface EmployeeService {
    function create(array $employee): int;
}
