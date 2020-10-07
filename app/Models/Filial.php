<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model {
    protected $table = 'filial';
    public $timestamps = false;
    public $fillable = [
        'name',
        'locality',
        'street',
        'building'
    ];

    public function buildings() {
        return $this->hasMany(Building::class, 'filial_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_has_filial', 'filial_id', 'user_id');
    }
}
