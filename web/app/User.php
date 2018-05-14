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
        'first_name', 'last_name', 'email', 'password', 'provider', 'provider_id', 'image_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'provider_id',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'dob'
    ];

    /**
     * The jobs that belong to the user.
     */
    public function jobs() 
    {
        return $this->hasMany('Jobs');
    }

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

    /**
     * The role that belongs to the user.
     */
    public function hasUserRole()
    {
        return $this->hasOne('App\RoleUser');
    }
}
