<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model {
    protected $table = 'inventory';
    public $timestamps = false;
    public $fillable = [
        'parrent_id',
        'workplace_id',
        'name',
        'buhcode',
        'models_id',
        'active'
    ];

    public function workplace() {
        return $this->belongsTo(Workplace::class, 'workplace_id');
    }

    public function parent() {
        return $this->belongsTo(Inventory::class, 'parrent_id');
    }

    public function accessories() {
        return $this->hasMany(Inventory::class, 'parrent_id');
    }

    public function model() {
//        return $this->belongsTo(Models::class, 'models_id');
    }
}
