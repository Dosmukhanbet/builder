<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Job;
use Illuminate\Http\Request;
use App\Events\JobWasPublished;
use App\Http\Requests;

class RegistrationController extends Controller
{

    public function storeUserAndJob(Request $request)
    {
        $this->validate($request, [
            'Кратко_о_работе' => 'required',
            'Описание' => 'required',
            'dateOfMake' => 'required|date',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|max:12|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'email' =>$request['email'],
            'name' => $request['name'],
            'type' => 'client',
            'city_id' => $request['city_id'],
            'phone_number' => $request['phone_number'],
            'password' => bcrypt($request['password']),
        ]);

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

        Auth::login($user);
        event(new JobWasPublished($job));

        return redirect('job/show/'. $job->id);


    }

    public function registerAndCreateJob()
    {
        return view('jobs.createjobanduser');
    }
}
