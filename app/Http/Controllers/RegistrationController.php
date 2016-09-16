<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\User;
use App\Services\SMS;
use App\Http\Requests;
use App\Services\AppMailer;
use Illuminate\Http\Request;
use App\Events\JobWasPublished;

class RegistrationController extends Controller
{
    protected $sms;
    protected $mailer;

    function __construct(SMS $sms, AppMailer $mailer)
    {
        $this->sms = $sms;
        $this->mailer = $mailer;
    }

    public function storeUserAndJob(Request $request)
    {
        $this->validate($request, [
            'Кратко_о_работе' => 'required',
            'Описание'        => 'required',
            'dateOfMake'      => 'required|date',
            'name'            => 'required|max:255',
            'email'           => 'required|email|unique:users',
            'phone_number'    => 'required|max:12|unique:users',
            'password'        => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'email'        =>$request['email'],
            'name'         => $request['name'],
            'type'         => 'client',
            'city_id'      => $request['city_id'],
            'phone_number' => $request['phone_number'],
            'password'     => bcrypt($request['password']),
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

        $this->nofifyMasters($request['category_id'], $request['city_id']);

        Auth::login($user);
        event(new JobWasPublished($job));

        return redirect('job/show/'. $job->id);


    }

    public function nofifyMasters ($catId, $cityId)
    {
        $masters = User::where('type', 'master')
                        ->where('category_id', $catId)
                        ->where('city_id', $cityId)
                        ->get();

                        foreach ($masters as $master) {
                            $text = 'Uvajaemyi master! Vam postupila zaiavka, speshite ee vypolnit!. http://sheber.club/master/active/jobs';
                            $this->sms->send($master->phone_number, $text);
                        }

    } 

    public function sendMailRecomendation ()
    {
        $masters = User::where('type', 'master')
                    ->where('photo_path', NULL)
                    ->get();
                    // dd($masters);
                        foreach ($masters as $master) {
                          $this->mailer->sendEmailTo($master, 'email.addphoto',  'Добавьте фото для профиля!');  
                        }
    } 

    public function registerAndCreateJob()
    {
        return view('jobs.createjobanduser');
    }
}
