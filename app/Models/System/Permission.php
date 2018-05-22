<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	protected $table = "sys_permissions";
	protected $primaryKey = "id";

    public function roles()
    {
        //return $this->belongsToMany(Role::class);
        return $this->belongsToMany('App\Models\System\Role', 'sys_role_user', 'user_id', 'role_id');
    }
    
}