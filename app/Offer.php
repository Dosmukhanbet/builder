<?php

namespace App;

use App\Job;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['job_id', 'user_id', 'price', 'comment', 'status'];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
