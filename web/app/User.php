<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'provider_id',
    ];

    /**
     * The skills that belong to the user.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    /**
     * The interests that belong to the user.
     */
    public function interests()
    {
        return $this->belongsToMany('App\Interest');
    }
}
