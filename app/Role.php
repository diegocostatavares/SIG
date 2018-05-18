<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected  $table = "roles";


    /**
     * Relation Permissions
     * @return object
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}