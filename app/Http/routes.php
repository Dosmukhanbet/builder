<?php

Route::get('/', function () {
  return view('welcome');
});

Route::auth();

//ConfirmEmail
Route::get('register/confirm/{token}', 'RegistrationController@confirmEmail');

// API
Route::post('api/sendsms', 'NotifyController@sendSms');
Route::get('/home', 'HomeController@index');
Route::get('api/categories', function (){ return \App\Category::all(); });



// Job Publishing
Route::group(['prefix'=> 'job', 'middleware' => 'auth'], function()
    {
        Route::get('create', 'JobsController@create');
        Route::post('create', 'JobsController@store');
        Route::get('all', 'JobsController@all');
        Route::get('show/{id}', 'JobsController@show');
//        Route::get('/category/{category}/city/{city}', 'JobsController@getPostedJobs');
        Route::post('addphoto/{job}', 'JobsController@addPhoto');
        Route::get('showoffers/{jobId}', 'OffersController@showOffers');

    }
);


Route::group(['prefix' => 'master', 'middleware' => 'master'], function(){
    Route::get('active/jobs', 'MastersController@getActiveJobs');
    Route::get('show/job/{jobId}', 'MastersController@show');
    Route::post('offer/for/{jobId}', 'OffersController@store');
});

