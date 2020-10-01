<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeattrib extends Model
{
    protected $table = 'typeattrib';
    public $timestamp = false;
    public $filible = [
        'name',
        'typeinvent_id',
    ];




    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function attribute()
    {
        return $this->hasMany(Attribute::class,'typeattrib_id');
    }
}
