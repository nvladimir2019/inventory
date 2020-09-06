<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model {
    protected $table = 'providers';
    public $timestamps = false;
    public $fillable = [
        'name'
    ];

    public function inventory() {
        return $this->hasMany(Inventory::class, 'provider_id');
    }
}
