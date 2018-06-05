<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $table = 'job_vacancies';

    protected $fillable = [
        'job_id', 'requested_by',
    ];

    public function vacancySkills() {
        return $this->hasMany('App\JobVacancySkill');
    }

    public function job() {
        return $this->belongsTo('App\Job');
    }
}
