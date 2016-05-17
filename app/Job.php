<?php

namespace App;

use App\User;
use App\Offer;
use App\JobPhoto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [ 'name',
                            'description',
                            'user_id',
                            'category_id',
                            'status',
                            'dateOfMake'];

    protected $dates = ['dateOfMake'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function setdateOfMakeAttribute($date)
    {
        $this->attributes['dateOfMake'] = Carbon::createFromFormat('Y-m-d H:i', $date);
    }


    public function photos()
    {
        return $this->hasMany(JobPhoto::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }


    public function isOffered()
    {

        foreach($this->offers as $offer){
            if($offer->user_id == Auth::user()->id)
            return true;

        }

        return false;
    }

}
