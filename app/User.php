<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'dob', 'phone_name', 'phone_series', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function hasAnyRoles($role)
    {
        if($this->roles()->where('roles.id', $role)->first())
        {
            return true;
        }
        return false;
    }
    public function hasRole($role)
    {
        if($this->roles()->where('roles.id', $role)->first())
        {
            return true;
        }
        return false;
    }
    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }
}
