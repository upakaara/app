<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
      'title', 'description', 'summary', 'status', 'job_type_id', 'duration',
    ];

    protected $dates = ['deleted_at', 'start_date', 'end_date'];

    public function user() {
        return $this->belongsTo('User');
    }

    // Each job hAS one jobtype
    public function jobType() {
        return $this->belongsTo('App\JobType');
    }
}
