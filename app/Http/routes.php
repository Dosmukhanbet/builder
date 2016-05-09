<?php

Route::get('/', function () {
  return view('welcome');
});

Route::auth();

//ConfirmEmail
Route::get('register/confirm/{token}', 'RegistrationController@confirmEmail');


Route::post('api/sendsms', 'NotifyController@sendSms');
Route::get('api/categories', function (){
    return \App\Category::all();
});

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=> 'job'], function()
    {
        Route::get('create', 'JobsController@create');
        Route::post('create', 'JobsController@store');
    }
);

