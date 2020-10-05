<?php


namespace App\Services\Implement;


use App\Models\Inventory;
use App\Models\ModelM;
use App\Services\Contracts\InventoryService;
use Illuminate\Support\Facades\Log;

class InventoryServiceImpl implements InventoryService
{

    function create(array $i): int {
        $inventory = new Inventory();

        if(isset($i['parrent_id'])) {
            $inventory->parrent_id = $i['parrent_id'];
        }

        $inventory->workplace_id = $i['workplace_id'];
        $inventory->name = $i['name'];
        $inventory->buhcode = $i['buhcode'];
        $inventory->models_id = $i['models_id'];
        $inventory->active = $i['active'];
        $inventory->provider_id = $i['provider_id'];
        $inventory->date_of_delivery = $i['date_of_delivery'];
        $inventory->guarantee_period = $i['guarantee_period'];
        $inventory->status_id = $i['status_id'];
        $inventory->save();

        return $inventory->id;
    }


    function getModelsFilter(array $filters) {
        $models = new ModelM();

        if(isset($filters['type']) && $filters['type'] !== null) {
            $models = $models->where('typeinvent_id', $filters['type']);
        }

        if(isset($filters['manufacturer']) && $filters['manufacturer'] !== null) {
            $models = $models->where('manufacturers_id', $filters['manufacturer']);
        }

        return $models->get();
    }

    function withInventoryNumbers(int $workplaceId) {
        return Inventory::where('workplace_id', $workplaceId)
            ->where('buhcode', '!=', '')
            ->with('model')
            ->get();
    }

    function getByWorkplaceId(int $workplaceId) {
        return Inventory::where('workplace_id', $workplaceId)
            ->with('model')
            ->get();
    }
}
