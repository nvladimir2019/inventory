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

        if(isset($i['inventory'])) {
            $inventory->parrent_id = $i['inventory'];
        }

        $inventory->workplace_id = $i['workplace'];
        $inventory->name = $i['name'];
        $inventory->buhcode = $i['buhcode'];
        $inventory->models_id = $i['model'];
        $inventory->active = 1;
        $inventory->provider_id = $i['provider'];
        $inventory->date_of_delivery = $i['date_of_delivery'];
        $inventory->guarantee_period = $i['guarantee_period'];
        $inventory->status_id = $i['status'];
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

    function withInventoryNumbers(int $workplaceId, int $page) {
        $inventory = Inventory::where('workplace_id', $workplaceId)
            ->where('buhcode', '!=', '')
            ->with('model')
            ->paginate(15, ['*'], 'page', $page);
        $paginator = new Paginator($inventory->items(), $inventory->total(), $inventory->perPage(), $inventory->currentPage());

        return [
            'inventory' => $inventory,
            'paginator' => $paginator->getElements()
        ];
    }

    function getByWorkplaceId(int $workplaceId, int $page) {
        $inventory = Inventory::where('workplace_id', $workplaceId)
            ->with('model')
            ->paginate(15, ['*'], 'page', $page);
        $paginator = new Paginator($inventory->items(), $inventory->total(), $inventory->perPage(), $inventory->currentPage());

        return [
            'inventory' => $inventory,
            'paginator' => $paginator->getElements()
        ];
    }
}
