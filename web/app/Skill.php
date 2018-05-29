<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function jobTypeSkill()
    {
        return $this->hasMany('App\JobTypeSkill');
    }
}
