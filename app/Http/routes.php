<?php

Route::get('/', function () {
  return view('home');
});

Route::auth();

///Create client user and job
Route::get('create/registerandcreatejob', 'RegistrationController@registerAndCreateJob');
Route::post('registerandcreatejob', 'RegistrationController@storeUserAndJob');

//find masters
Route::get('find/masters', 'SearchMastersController@findMasters');

// API
Route::post('api/sendsms', 'NotifyController@sendSms');
Route::post('api/invitesendsms', 'NotifyController@invitesendSms');
Route::post('api/findmasters/{catId}', 'SearchMastersController@mastersbycategory');
Route::get('api/masterslist/', 'JobsController@masterslist');
Route::get('/home', 'HomeController@index');
Route::get('api/categories', function (){ return \App\Category::all(); });
Route::post('api/makejobdone/{id}', 'JobsController@makejobdone');
Route::post('api/recommendations/{categoryId}', 'RecommendationController@masters');



// Job Publishing
Route::group(['prefix'=> 'job', 'middleware' => 'auth'], function()
    {

        Route::get('all', 'JobsController@all');
        Route::get('show/{id}', 'JobsController@show');
//      Route::get('/category/{category}/city/{city}', 'JobsController@getPostedJobs');


    }
);

Route::group(['prefix'=> 'job', 'middleware' => ['auth','client']], function()
    {
        Route::post('addphoto/{job}', 'JobsController@addPhoto');
        Route::patch('{job}', 'JobsController@update');
        Route::get('showoffers/{jobId}', 'OffersController@showOffers');
        Route::get('create', 'JobsController@create');
        Route::post('create', 'JobsController@store');
        Route::get('all', 'JobsController@all');
        Route::get('show/{id}', 'JobsController@show');
        Route::post('addphoto/{job}', 'JobsController@addPhoto');
        Route::get('showoffers/{jobId}', 'OffersController@showOffers');
        Route::get('accept/offer/{offerId}/{offeredUserId}', 'OffersController@acceptOffer');
        Route::get('client/profile/', 'ProfileController@clientProfileShow');
        Route::get('client/leavefeedback/', 'ProfileController@feedbackCreate');
        Route::post('clientprofile/addphoto', 'ProfileController@savePhoto');
    }
);




Route::group(['prefix' => 'master', 'middleware' => ['auth','master']], function(){
    Route::get('active/jobs', 'MastersController@getActiveJobs');
    Route::get('show/job/{jobId}', 'MastersController@show');
    Route::post('offer/for/{jobId}', 'OffersController@store');
    Route::get('profile', 'ProfileController@show');
    Route::post('profile/addphoto', 'ProfileController@savePhoto');
    Route::get('invites', 'InvitesController@all');

});



Route::group(['prefix' => 'admin'], function(){
    Route::get('manage', function () {
        return view('admin.manage');
    });
    Route::post('addCategories', 'AdminController@addcategory');
    Route::post('addCities', 'AdminController@addcity');

});



Route::post('addFeedback/{masterid}', 'FeedbackController@leave');
