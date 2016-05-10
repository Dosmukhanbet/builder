<?php

namespace App\Http\Controllers;

use App\Events\JobWasPublished;
use App\Job;
use Auth;
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

        flash()->success('Заявка добавлена!', "валофапывпдод");

        event(new JobWasPublished($job));

        return redirect('job/show/'.$job->id);

    }


    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }
}
