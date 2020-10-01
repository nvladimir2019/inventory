<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInventoryRequest;
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
}
