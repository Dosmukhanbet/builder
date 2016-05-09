<?php

namespace App;

use App\Job;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'phone_number' => 'integer',
    ];
    protected $fillable = [
        'name', 'password', 'phone_number', 'email', 'confirmed', 'city_id'
    ];

    public static function boot ()
    {
        parent::boot();

        static::creating(function($user){
            $user->token = str_random(30);
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
