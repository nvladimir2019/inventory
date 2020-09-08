<?php

namespace App\Models;


class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'models';
    public $timestamp = false;
    public $filible = [
        'name',
        'manufacturers_id',
        'typeinvent_id',
    ];


    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturers_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class,'id');
    }
}
