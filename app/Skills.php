<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';

    public function user()
    {
    	return $this->belongsTo(User::class);
    } 

}
