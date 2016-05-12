<?php

namespace App\Http\Controllers;

use App\Events\JobWasPublished;
use App\Job;
use App\JobPhoto;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;

class JobsController extends Controller
{


    public function getPostedJobs($categoryId, $cityId)
    {
        $jobs = Job::where('category_id', $categoryId)
                        ->where('city_id', $cityId)
                        ->where('dateOfMake', '>=' , Carbon::now())
                        ->get();
        dd($jobs);
    }
    
    public function create()
    {
        return view('jobs.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'Кратко_о_работе' => 'required',
            'city_id' => 'required',
            'Описание' => 'required',
            'Дата_Исполнения' => 'required|date'
        ]);
        $user = Auth::user();

        $job = new Job;
        $job->name = $request['Кратко_о_работе'];
        $job->city_id = $request['city_id'];
        $job->description = $request['Описание'];
        $job->dateOfMake = $request['Дата_Исполнения'];
        $job->category_id = $request['category_id'];
        $job->user_id = $user->id;
        $job->save();

        flash()->success('Заявка добавлена!', "Вы можете добавить фотографии");

        event(new JobWasPublished($job));

        return redirect('job/show/'. $job->id);

        return view('forms.addphoto', compact('job'));

    }


    public function addPhoto($jobId, Request $request)
    {

//        $file = $request->file('photo');
//        $filename = time().$file->getClientOriginalName();
//        $file->move('jobs/photos', $filename);

        $photo = new JobPhoto();

        $photo->addPhoto($request->file('photo'),Job::find($jobId) );
//        $job = Job::find($jobId)->addPhoto($request->file('photo'));
//
//        $job->photos()->create(['path' => "/jobs/photos/{$filename}" ]);



    }


    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }
}
