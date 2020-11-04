<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInventoryRequest;
use App\Http\Requests\MoveInventoryRequest;
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
        $data = $request->json()->all();
        $inventory = $this->inventoryService->withInventoryNumbers($data['workplaceId'], $data['page']);
        return response()->json($inventory);
    }

    public function getByWorkplaceId(Request $request) {
        $data = $request->json()->all();
        $inventory = $this->inventoryService->getByWorkplaceId($data['workplaceId'], $data['page']);
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

    public function move(MoveInventoryRequest $request) {

    }
}
