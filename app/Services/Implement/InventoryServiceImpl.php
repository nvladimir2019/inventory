<?php


namespace App\Services\Implement;


use App\Models\Inventory;
use App\Services\Contracts\InventoryService;

class InventoryServiceImpl implements InventoryService
{

    function create(array $i): int {
        $inventory = new Inventory();
        $inventory->parrent_id = $i['parrent_id'];
        $inventory->workplace_id = $i['workplace_id'];
        $inventory->name = $i['name'];
        $inventory->buhcode = $i['buhcode'];
        $inventory->models_id = $i['models_id'];
        $inventory->active = $i['active'];
        $inventory->provider_id = $i['provider_id'];
        $inventory->date_of_delivery = $i['date_of_delivery'];
        $inventory->guarantee_period = $i['guarantee_period'];
        $inventory->save();

        return $inventory->id;
    }
}
