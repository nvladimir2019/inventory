<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Workplace;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function index() {
        return view('main', [
            'countWorkspaces' => Workplace::count(),
            'devicesInOperation' => Inventory::where('active', 1)->count(),
            'devicesInStock' => 0,
            'devicesNonWorking' => Inventory::where('active', 0)->count()
        ]);
    }
}
