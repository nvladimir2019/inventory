<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInventoryRequest;
use App\Models\Inventory;
use App\Services\Contracts\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller {
    /**
     * @var InventoryService
     */
    private $inventoryService;

    public function __construct(InventoryService $inventoryService) {
        $this->inventoryService = $inventoryService;
    }

    public function add(AddInventoryRequest $request) {
        $this->inventoryService->create([
            'workplace_id' => $request->post('workplace_id'),
            'name' => $request->post('name'),
            'buhcode' => $request->post('buhcode'),
            'models_id' => $request->post('model'),
            'provider_id' => $request->post('provider'),
            'date_of_delivery' => $request->post('date_of_delivery'),
            'guarantee_period' => $request->post('guarantee_period'),
            'active' => 1,
            'status_id' => $request->post('status')
        ]);

        return redirect()->to(route('read-workplace', $request->post('workplace_id')));
    }

    public function getModels(Request $request) {
        $models = $this->inventoryService->getModelsFilter($request->json()->all());
        return response()->json($models);
    }

    public function withInventoryNumbers(Request $request) {

        $inventory = $this->inventoryService->withInventoryNumbers($request->json('workplaceId'));
        return response()->json($inventory);
    }

    public function getByWorkplaceId(Request $request) {
        $inventory = $this->inventoryService->getByWorkplaceId($request->json('workplaceId'));
        return response()->json($inventory);
    }

    public function read($id) {
        return view('inventory.read', [
            'inventory' => Inventory::find($id)
        ]);
    }
}
