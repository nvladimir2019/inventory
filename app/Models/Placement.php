<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model {
    protected $table = 'placement';
    public $timestamps = false;
    public $fillable = [
        'placement',
        'typeplace_id',
        'floor_id'
    ];

    public function floor() {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function typePlace() {
        return $this->belongsTo(Typeplace::class, 'typeplace_id');
    }

    public function workplace() {
        return $this->hasMany(Workplace::class, 'placement_id');
    }
}
