<?php


namespace App\Services\Implement;


use App\Models\Filial;
use App\Services\Contracts\FilialService;

class FilialServiceImpl implements FilialService {

    function create(array $f): int {
        $filial = new Filial();
        $filial->name = $f['name'];
        $filial->locality = $f['locality'];
        $filial->street = $f['street'];
        $filial->building = $f['building'];
        $filial->save();

        return $filial->id;
    }
}
