<?php

Route::get('/', function () {
  return view('home');
});

Route::auth();

///Create client user and job
Route::get('create/registerandcreatejob', 'RegistrationController@registerAndCreateJob');
Route::post('registerandcreatejob', 'RegistrationController@storeUserAndJob');

//find masters
Route::get('find/masters', 'MastersController@findMasters');

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
//      Route::get('/category/{category}/city/{city}', 'JobsController@getPostedJobs');
        Route::post('addphoto/{job}', 'JobsController@addPhoto');
        Route::get('showoffers/{jobId}', 'OffersController@showOffers');

    }
);

Route::group(['prefix'=> 'job', 'middleware' => 'client'], function()
    {
        Route::get('all', 'JobsController@all');
        Route::get('show/{id}', 'JobsController@show');
        Route::post('addphoto/{job}', 'JobsController@addPhoto');
        Route::get('showoffers/{jobId}', 'OffersController@showOffers');
        Route::get('accept/offer/{offerId}/{offeredUserId}', 'OffersController@acceptOffer');
        Route::get('client/profile/', 'ProfileController@clientProfileShow');
        Route::post('clientprofile/addphoto', 'ProfileController@savePhoto');
    }
);




Route::group(['prefix' => 'master', 'middleware' => 'master'], function(){
    Route::get('active/jobs', 'MastersController@getActiveJobs');
    Route::get('show/job/{jobId}', 'MastersController@show');
    Route::post('offer/for/{jobId}', 'OffersController@store');
    Route::get('profile', 'ProfileController@show');
    Route::post('profile/addphoto', 'ProfileController@savePhoto');
});

