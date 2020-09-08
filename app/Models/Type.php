<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';
    public $timestamp = false;
    public $filible = [
        'name',
    ];

    public function model()
    {
        return $this->hasMany(Model::class,'typeinvent_id');
    }
}
