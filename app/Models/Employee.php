<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
    protected $table = 'employee';
    public $timestamps = false;
    public $fillable = [
        'first_name',
        'surename',
        'middle_name',
        'department_id',
        'workplace_id'
    ];

    public function workplace() {
        return $this->belongsTo(Workplace::class, 'workplace_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
