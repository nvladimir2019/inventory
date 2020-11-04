<?php


namespace App\Services\Implement;


use App\Models\Moves;
use App\Services\Contracts\MovesService;

class MovesServiceImpl implements MovesService
{

    function create(array $m){
        $move = new Moves();
        $move->inventory_id = $m['inventory_id'];
        $move->from_id = $m['from_id'];
        $move->to_id = $m['to_id'];
        $move->date_moves = $m['date_moves'];
        $move->descriptions = $m['descriptions'];
        $move->user_id = $m['user_id'];
        $move->save();
    }

    function getByInventoryId(int $id) {
        return Moves::where('inventory_id', $id)->get();
    }
}
