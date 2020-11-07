<?php


namespace App\Services\Implement;


use App\Models\Employee;
use App\Services\Contracts\EmployeeService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeServiceImpl implements EmployeeService {

    function create(array $e): int {
        $employee = new Employee();
        $employee->first_name = $e['first_name'];
        $employee->surename = $e['surename'];
        $employee->middle_name = $e['middle_name'];
        $employee->department_id = $e['department_id'];
        $employee->workplace_id = $e['workplace_id'];
        $employee->save();

        return $employee->id;
    }

    function getByFilter(array $filter) {
        $employees = DB::table('employee');

        if(isset($filter['workplace'])) {
            $employees->where('workplace_id', $filter['workplace']);
        }
        elseif(isset($filter['department'])) {
            $employees->where('department_id', $filter['department']);
        }

        $employees = $employees->paginate(15, ['employee.*'], 'page', $filter['page']);

        $paginator = new Paginator($employees->items(), $employees->total(), $employees->perPage(), $employees->currentPage());


        return [
            'employees' => $employees,
            'paginator' => $paginator->getElements()
        ];
    }
}
