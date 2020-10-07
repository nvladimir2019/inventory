<?php


namespace App\Services\Implement;


use App\Models\Workplace;
use App\Services\Contracts\WorkplaceService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkplaceServiceImpl implements WorkplaceService {

    function getByFilters(array $filters) {
        $workplace = DB::table('workplace');

        if(isset($filters['room']) && $filters['room'] != null) {
            $workplace
                ->join('placement', 'workplace.placement_id', '=', 'placement.id')
                ->where('placement.id', $filters['room']);
        }
        elseif(isset($filters['floor']) && !empty($filters['floor'])) {
            $workplace
                ->join('placement', 'workplace.placement_id', '=', 'placement.id')
                ->join('floor', 'placement.floor_id', '=', 'floor.id')
                ->where('floor.id', $filters['floor']);
        }
        elseif(isset($filters['building']) && !empty($filters['building'])) {
            $workplace
                ->join('placement', 'workplace.placement_id', '=', 'placement.id')
                ->join('floor', 'placement.floor_id', '=', 'floor.id')
                ->join('building', 'floor.building_id', '=', 'building.id')
                ->where('building.id', $filters['building']);
        }
        elseif(isset($filters['filial']) && !empty($filters['filial'])) {
            $workplace
                ->join('placement', 'workplace.placement_id', '=', 'placement.id')
                ->join('floor', 'placement.floor_id', '=', 'floor.id')
                ->join('building', 'floor.building_id', '=', 'building.id')
                ->join('filial', 'building.filial_id', '=', 'filial.id')
                ->where('filial.id', $filters['filial']);
        }
        if(!empty($filters['department'])) {
            $workplace->where('workplace.department_id', $filters['department']);
        }

        return $workplace->get('workplace.*');
    }

    function add(array $w): int {
        $workplace = new Workplace();
        $workplace->department_id = $w['department_id'];
        $workplace->placement_id = $w['placement_id'];
        $workplace->active = $w['active'];
        $workplace->name = $w['name'];

        $workplace->save();

        return $workplace->id;
    }

    function save(array $w): int {
        $workplace = Workplace::find($w['id']);
        $workplace->name = $w['name'];
        $workplace->department_id = $w['department'];
        $workplace->placement_id = $w['placement'];

        $workplace->save();

        return $workplace->id;
    }
}
