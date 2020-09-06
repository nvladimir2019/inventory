<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeplace extends Model {
    protected $table = 'typeplace';
    public $timestamps = false;
    public $fillable = [
        'name'
    ];

    public function placement() {
        return $this->hasMany(Placement::class, 'typeplace_id');
    }
}
