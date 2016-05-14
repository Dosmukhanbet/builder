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



    
    public function create()
    {
        return view('jobs.create');
    }


    public function store(Request $request)
    {
//        dd($request->dateOfMake);

        $this->validate($request, [
            'Кратко_о_работе' => 'required',
            'city_id' => 'required',
            'Описание' => 'required',
            'dateOfMake' => 'required|date'
        ]);
        $user = Auth::user();

        $job = new Job;
        $job->name = $request['Кратко_о_работе'];
        $job->city_id = $request['city_id'];
        $job->description = $request['Описание'];
        $job->dateOfMake = $request['dateOfMake'];
        $job->category_id = $request['category_id'];
        $job->user_id = $user->id;
        $job->price= $request['price'];
        $job->save();

        flash()->success('Заявка добавлена!', "Вы можете добавить фотографии");

        event(new JobWasPublished($job));

        return redirect('job/show/'. $job->id);


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

    public function all()
    {
        $jobs = Job::with('offers.user')->where('user_id', Auth::user()->id)->get();
        return view('jobs.all', compact('jobs'));
    }


    public function show($id)
    {

        $job = Job::find($id);
        if($job->user_id != Auth::user()->id)
        {
            flash()->error('Ошибка', 'Нельзя просматривать и редактировать чужие записи!');
            return back();
        }
        return view('jobs.show', compact('job'));
    }
}
