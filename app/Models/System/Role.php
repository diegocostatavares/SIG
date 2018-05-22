<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = "sys_roles";
    protected $primaryKey = "id";

    public function permissions()
    {
        //return $this->belongsToMany(Permission::class);
        return $this->belongsToMany('App\Models\System\Permission', 'sys_permission_role', 'role_id', 'permission_id');
    }

}