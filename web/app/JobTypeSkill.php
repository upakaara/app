<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTypeSkill extends Model
{
    protected $table = 'job_types_skills';

    public function jobType()
    {
        return $this->belongsTo('App\JobType');
    }
}
