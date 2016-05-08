<?php

use App\User;

Route::get('/', function () {
  return view('welcome');
});

Route::auth();
Route::get('register/confirm/{token}', 'RegistrationController@confirmEmail');


Route::post('api/sendsms', 'NotifyController@sendSms');
Route::get('api/categories', function (){
    return \App\Category::all();
});

Route::get('/home', 'HomeController@index');

