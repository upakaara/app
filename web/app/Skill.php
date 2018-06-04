<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function jobTypeSkill()
    {
        return $this->hasOne('App\JobTypeSkill');
    }

    public function jobVacancySkill()
    {
        return $this->hasMany('App\JobVacancySkill');
    }
}
