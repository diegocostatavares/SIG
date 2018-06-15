<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = "sys_role_user";

    protected $fillable = [
        'id_user', 'id_role'
    ];

}