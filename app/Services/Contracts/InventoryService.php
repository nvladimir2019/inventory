<?php


namespace App\Services\Contracts;


interface InventoryService
{
    function create(array $inventory): int;

}
