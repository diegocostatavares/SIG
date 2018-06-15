<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	protected $table = "sys_permissions";
	protected $primaryKey = "id_permission";

    protected $fillable = [
        'id_permission', 'name', 'label'
    ];

    public function roles() 
    {
        //return $this->belongsToMany(Role::class);
        return $this->belongsToMany('App\Models\System\Role', 'sys_role_user', 'id_user', 'id_role');
    }
    
}