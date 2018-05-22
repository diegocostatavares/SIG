<?php
namespace App\Models\System;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserAmended;

class User extends Authenticatable
{

    protected $table = "sys_users";
    protected $primaryKey = "id_user";

    use Notifiable;
    
    protected $dispatchesEvents = [
        'saved' => UserAmended::class,
        'deleted' => UserAmended::class,
        'restored' => UserAmended::class,
    ];

    public function roles()
    {
        //return $this->belongsToMany(Role::class);
        return $this->belongsToMany('App\Models\System\Role', 'sys_role_user', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name',$role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    public function isRoot()
    {
        return ($this->hasRole('root')) ? true : false;
    }

    public function isAdmin()
    {
        return ($this->hasRole('admin')) ? true : false;
    }
}