<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
	protected $fillable = ['user_id', 'path', 'thumbnail_path'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    } 
}
