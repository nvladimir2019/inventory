<?php

namespace App\Models;


class ModelM extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'models';
    protected $with = ['type', 'manufacturer'];
    public $timestamp = false;
    public $filible = [
        'name',
        'manufacturers_id',
        'typeinvent_id',
    ];


    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'manufacturers_id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'typeinvent_id');
    }

    public function inventory() {
        return $this->hasMany(Inventory::class,'id');
    }

    public function typeAttrib() {
        return $this->belongsToMany(
            Typeattrib::class,
            'attributes',
            'models_id',
            'typeattrib_id'
        );
    }
}
