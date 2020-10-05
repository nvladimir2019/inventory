<?php


namespace App\Services\Contracts;


interface InventoryService
{
    function create(array $inventory): int;
    function getModelsFilter(array $filters);
    function withInventoryNumbers(int $workplaceId);
    function getByWorkplaceId(int $workplaceId);
}
