<?php

namespace App;

use App\Job;
use App\City;
use App\Offer;
use App\Invite;
use App\Rating;
use App\Skills;
use App\Category;
use App\Feedback;
use App\Attachment;
use Illuminate\Http\Request;
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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 


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

    public function skills()
    {
        return $this->hasOne(Skills::class);
    }

    public function addSkills(Skills $skills)
    {
        $this->skills()->save($skills);
    } 

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }






}
