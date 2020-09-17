<?php

namespace App\Http\Controllers;

use App\models\Building;
use App\Models\Department;
use App\Models\Filial;
use App\Models\Workplace;
use Illuminate\Http\Request;

class WorkplacesController extends Controller {
    public function index() {
        return view('workplaces.index', [
            'filials' => Filial::all(),
            'departments' => Department::all(),
            'workplaces' => Workplace::paginate(15)
        ]);
    }

    public function getBuilding(Request $request) {
        $json = $request->json()->all();
        return response()->json(Building::where('filial_id', $json['workplaceId'])->get());
    }
}
