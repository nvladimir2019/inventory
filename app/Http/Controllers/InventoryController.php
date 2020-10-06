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
        $this->inventoryService->create($request->post());
        return redirect()->to(route('read-workplace', $request->post('workplace')));
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

    public function get() {
        $inventory = Inventory::all();
        return response()->json($inventory);
    }
}
