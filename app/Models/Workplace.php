<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model {
    protected $table = 'workplace';
    public $timestamps = false;
    public $fillable = [
        'department_id',
        'placement_id',
        'active',
        'name'
    ];

    public function placement() {
        return $this->belongsTo(Placement::class, 'placement_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function movesFrom() {
        return $this->hasMany(Moves::class, 'from_id');
    }

    public function movesTo() {
        return $this->hasMany(Moves::class, 'to_id');
    }

    public function inventory() {
        return $this->hasMany(Inventory::class, 'workplace_id');
    }

    public function employees() {
        return $this->hasMany(Employee::class, 'workplace_id');
    }
}
