<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobVacancySkill extends Model
{
    protected $table = 'job_vacancy_skills';

    protected $fillable = [
       'job_vacancy_id', 'skill_id',
    ];

    public function vacancies() {
        return $this->belongsTo('App\JobVacancy');
    }

    public function skills() {
        return $this->hasMany('App\Skill');
    }
}
