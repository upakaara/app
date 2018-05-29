<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = 'job_types';

    protected $fillable = [
      'name',
    ];

    public function jobs() {
        return $this->hasMany('App\Job');
    }

    public function skills()
    {
        return $this->hasMany('App\JobTypeSkill');
    }
}
