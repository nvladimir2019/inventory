<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    public $timestamp = false;
    public $filible = [
        'name',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_has_roles');
    }


}
