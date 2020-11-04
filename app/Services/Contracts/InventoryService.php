<?php


namespace App\Services\Contracts;


interface InventoryService
{
    function create(array $inventory): int;
    function getModelsFilter(array $filters);
    function withInventoryNumbers(int $workplaceId, int $page);
    function getByWorkplaceId(int $workplaceId, int $page);
}
