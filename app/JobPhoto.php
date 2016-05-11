<?php

namespace App;

use App\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class JobPhoto extends Model
{
    public $timestamps = false;

    protected $fillable = ['job_id', 'path'];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function addPhoto(UploadedFile $file)
    {

    }
}
