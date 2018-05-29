<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobTypeInterest extends Model
{
    protected $table = 'job_types_interests';

    public function jobType()
    {
        return $this->belongsTo('App\JobType');
    }
}
