<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';
    public $timestamp = false;
    public $filible = [
        'name',
    ];

    public function model()
    {
        return $this->hasMany(Model::class,'manufacturers_id');
    }
}
