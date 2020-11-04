<?php


namespace App\Services\Contracts;


interface DepartmentService
{
    function create(array $department): int;
}
