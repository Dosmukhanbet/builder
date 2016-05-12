<?php

namespace App;

use App\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Image;


class JobPhoto extends Model
{
    public $timestamps = false;

    protected $fillable = ['job_id', 'path', 'thumbnail_path'];

    protected $dir = 'jobs/photos';

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function addPhoto(UploadedFile $file, Job $job)
    {
        $name = time().$file->getClientOriginalName();

        $file->move($this->dir, $name);

        $path = $this->dir. "/" . $name;
        $thumb = sprintf("%s/thumb-%s",$this->dir, $name);
        $this->makeThumbnail($path, $thumb);


        $job->photos()->create(['path' =>  $path,
                                   'thumbnail_path' =>  $thumb
                                ]);
    }


    public function makeThumbnail($path, $thumb)
    {
        Image::make($path)
            ->fit(150)
            ->save($thumb);
    }
}
