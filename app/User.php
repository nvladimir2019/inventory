<?php

namespace App;

use App\Models\Filial;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'roles_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function filial() {
        return $this->belongsToMany(
            Filial::class,
            'user_has_filial',
            'user_id',
            'filial_id'
        );
    }

    public function role() {
        return $this->belongsTo(Role::class,"roles_id");
    }

    public function hasRole($role) {
        return $this
            ->role()
            ->where("name", $role)
            ->exists();
    }

    public function hasPermission($perm) {
        /*** @var Role $role */
        $role = $this->role()->first();
        if($role == null) return false;
        return $role
            ->permissions()
            ->where("name", $perm)
            ->exists();
    }

    public function getPermissions(): Collection {
        /*** @var Role $role */
        $role = $this->role()->first();
        if($role == null) return new Collection();
        return $role->permissions()->get();
    }
}
