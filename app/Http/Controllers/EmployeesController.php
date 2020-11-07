<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEmployeeRequest;
use App\Models\Department;
use App\Services\Contracts\EmployeeService;
use Illuminate\Http\Request;

class EmployeesController extends Controller {
    private $employeeService;

    public function __construct(EmployeeService $employeeService) {
        $this->employeeService = $employeeService;
    }


    public function index() {
        return view('employees.index', [
            'departments' => Department::all()
        ]);
    }

    public function addSave(AddEmployeeRequest $request) {
        $this->employeeService->create($request->input());
        return redirect()->to(route('employees'));
    }

    public function getByFilter(Request $request) {
        $json = $request->json()->all();
        return response()->json($this->employeeService->getByFilter($json['filter']));
    }
}
