<?php


namespace App\Services\Contracts;


interface WorkplaceService {
    function getByFilters(array $filters);
    function add(array $workplace): int;
}
