<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    public $timestamps = false;

    public $fillable = [
        'models_id',
        'typeattrib_id',
        'value'
    ];

    public function model(){
        return $this->belongsTo(Model::class,'model_id');
    }

    public function typeattrib(){
        return $this->belongsTo(Typeattrib::class,'typeattrib_id');
    }

}
