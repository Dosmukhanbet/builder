<?php

namespace App;

use App\User;
use App\Job;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    public $fillable = ['user_id', 'job_id', 'from_user_id'];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function from()
    {
        return User::find($this->from_user_id);
    }


}
