<?php


namespace App\Services\Contracts;


interface EmployeeService {
    function create(array $employee): int;
    function getByFilter(array $filter);
}
