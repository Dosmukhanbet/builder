<?php

namespace App;

use App\User;
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

}
