<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddWorkplaceRequest;
use App\models\Building;
use App\Models\Department;
use App\Models\Filial;
use App\models\Floor;
use App\Models\Inventory;
use App\Models\Placement;
use App\Models\Workplace;
use App\Services\Contracts\WorkplaceService;
use Illuminate\Http\Request;

class WorkplacesController extends Controller {

    /**
     * @var WorkplaceService
     */
    private $workplaceService;

    public function __construct(WorkplaceService $workplaceService) {
        $this->workplaceService = $workplaceService;
    }

    public function index() {
        return view('workplaces.index', [
            'filials' => Filial::all(),
            'departments' => Department::all(),
            'workplaces' => Workplace::all()
        ]);
    }

    public function getBuilding(Request $request) {
        $json = $request->json()->all();
        return response()->json(Building::where('filial_id', $json['filialId'])->get());
    }

    public function getFloor(Request $request) {
        $json = $request->json()->all();
        return response()->json(Floor::where('building_id', $json['buildingId'])->get());
    }

    public function getRoom(Request $request) {
        $json = $request->json()->all();
        return response()->json(Placement::where('floor_id', $json['floorId'])->with('typePlace')->get());
    }

    public function getWorkplaces(Request $request) {
        $filters = $request->json()->all();
        return response()->json($this->workplaceService->getByFilters($filters));
    }

    public function add() {
        return view('workplaces.add', [
            'departments' => Department::all(),
            'filials' => Filial::all()
        ]);
    }

    public function addSave(AddWorkplaceRequest $request) {
        $id = $this->workplaceService->add([
            'department_id' => $request->post('department'),
            'placement_id' => $request->post('room'),
            'active' => 1,
            'name' => $request->post('name')
        ]);

        return redirect()->to(route('read-workplace', $id));
    }

    public function read($id) {
        return view('workplaces.read', [
            'workplace' => Workplace::find($id),
            'inventory' => Inventory::where('workplace_id', $id)->get()
        ]);
    }
}
