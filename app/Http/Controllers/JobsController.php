<?php

namespace App\Http\Controllers;

use App\Events\JobWasPublished;
use DB;
use App\User;
use App\Offer;
use App\Invite;
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
            'Описание' => 'required',
            'dateOfMake' => 'required|date'
        ]);
        $user = Auth::user();

        $job = new Job;
        $job->name = $request['Кратко_о_работе'];
        $job->city_id = $user->city_id;
        $job->description = $request['Описание'];
        $job->dateOfMake = $request['dateOfMake'];
        $job->category_id = $request['category_id'];
        $job->user_id = $user->id;
        $job->price= $request['price'];
        $job->save();

        flash()->success('Заявка добавлена!', "Вы можете добавить фотографии");

        event(new JobWasPublished($job));

        

        return redirect('job/showoffers/'. $job->id);


    }


    public function addPhoto($jobId, Request $request)
    {
       $photo = new JobPhoto();

        $photo->addPhoto($request->file('photo'),Job::find($jobId) );

    }

    public function all()
    {
        $jobs = Job::with('offers.user')->where('user_id', Auth::user()->id)->orderBy('dateOfMake', 'desc')->paginate(10);
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


    public function update(Request $request, Job $job)
    {
        $this->validate($request, [
            'Кратко_о_работе' => 'required',
            'Описание' => 'required',
            'dateOfMake' => 'required|date'
        ]);

        $job->name = $request['Кратко_о_работе'];
        $job->city_id = Auth::user()->city_id;
        $job->description = $request['Описание'];
        $job->dateOfMake = $request['dateOfMake'];
        $job->category_id = $request['category_id'];
        $job->user_id = Auth::user()->id;
        $job->price= $request['price'];
        $job->save();

        flash()->success('ok', 'Данная заявка успешна отредактирована!');
        return back();
    }

    public function makejobdone($id)
    {
        $job = Job::find($id);
        $job->status = 1;
        $job->save();
    }


/*
 * Return list of offered and invited masters for Job
 * */
    public function masterslist()
    {


    }
}
