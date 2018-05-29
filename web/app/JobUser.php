<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobUser extends Model
{
    use SoftDeletes;

    protected $table = 'job_users';

    protected $fillable = [
      'job_id', 'user_id', 'user_role',
    ];
}
