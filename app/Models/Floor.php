<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model {
    protected $table = 'floor';
    public $timestamps = false;

    public function building() {
        return $this->belongsTo(Building::class, 'building_id');
    }
}
