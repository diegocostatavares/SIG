<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	protected  $table = "permissions";

    /**
     * Relation Roles
     * @return object
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}