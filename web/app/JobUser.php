<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobUser extends Model
{
    protected $table = 'job_users';

    protected $fillable = [
      'job_id', 'user_id', 'user_role',
    ];
}