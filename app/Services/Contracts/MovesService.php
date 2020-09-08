<?php


namespace App\Services\Contracts;


interface MovesService
{
    function create(array $move);
    function getByInventoryId(int $id);
}
