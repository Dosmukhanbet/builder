<?php

namespace App;

use App\Job;
use App\Offer;
use App\Feedback;
use App\Invite;
use App\Rating;
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
        'name', 'password', 'phone_number', 'email', 'type','confirmed', 'city_id', 'category_id'
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

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }






}
