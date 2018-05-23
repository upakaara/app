<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'roles_user';

    public function hasRole()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }
}
