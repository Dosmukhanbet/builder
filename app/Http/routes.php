<?php
use Illuminate\Http\Request;

Route::get('/', function () {
return view('welcome');

});

Route::auth();

Route::post('api/sendsms', 'NotifyController@sendSms');

Route::get('/home', 'HomeController@index');

