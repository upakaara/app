<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function jobTypeInterest()
    {
        return $this->hasMany('App\JobTypeInterest');
    }
}
