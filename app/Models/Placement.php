<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model {
    protected $table = 'placement';
    public $timestamps = false;
    public $fillable = [
        'placement',
        'filial_id',
        'typeplace_id'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }

    public function typePlace() {
        return $this->belongsTo(Typeplace::class, 'typeplace_id');
    }

    public function workplace() {
        return $this->hasMany(Workplace::class, 'placement_id');
    }
}
