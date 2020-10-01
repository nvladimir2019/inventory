<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamp = false;
    public $filible = [
        'name',
    ];

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_has_roles');
    }

}
