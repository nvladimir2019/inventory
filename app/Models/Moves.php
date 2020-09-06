<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moves extends Model {
    protected $table = 'moves';
    public $timestamps = false;
    public $fillable = [
        'inventory_id',
        'from_id',
        'to_id',
        'date_moves',
        'descriptions',
        'user_id'
    ];

    public function inventory() {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function workplaceFrom() {
        return $this->belongsTo(Workplace::class, 'from_id');
    }

    public function workplaceTo() {
        return $this->belongsTo(Workplace::class, 'to_id');
    }

    public function user() {
//        return $this->belongsTo(User::class, 'user_id');
    }
}
