<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];


    public function users()
    {
        return $this->hasMany(\App\User::class);
    }
}
