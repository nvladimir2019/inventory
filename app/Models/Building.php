<?php

namespace App\models;

use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;

class Building extends Model {
    protected $table = 'building';
    public $timestamps = false;


    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }

    public function floors() {
        return $this->hasMany(Floor::class, 'building_id');
    }
}
