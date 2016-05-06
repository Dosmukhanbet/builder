<?php
use App\User;

Route::get('/', function () {
//    $user = User::findOrFail(1);
//
//    \Mail::send('email.confirm', ['user' => $user], function ($m) use ($user) {
//        $m->from('hello@app.com', 'Your Application');
//
//        $m->to('dosmukhanbet@mail.ru', $user->name)->subject('Your Reminder!');
//    });

});

Route::auth();
Route::get('register/confirm/{token}', 'RegistrationController@confirmEmail');


Route::post('api/sendsms', 'NotifyController@sendSms');
Route::get('api/categories', function (){
    return \App\Category::all();
});

Route::get('/home', 'HomeController@index');

