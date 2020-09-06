<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {
    protected $table = 'department';
    public $timestamps = false;
    public $fillable = [
        'namedept'
    ];

    public function workplaces() {
        return $this->hasMany(Workplace::class, 'department_id');
    }

    public function employees() {
        return $this->hasMany(Employee::class, 'department_id');
    }
}
