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
Route::get('sendemail', 'RegistrationController@sendMailRecomendation');

// API
Route::post('api/sendsms', 'NotifyController@sendSms');
Route::post('api/invitesendsms', 'NotifyController@invitesendSms');
Route::post('api/findmasters/{catId}/{cityId}', 'SearchMastersController@mastersbycategoryandcity');
Route::get('api/masterslist/', 'JobsController@masterslist');
Route::get('/home', 'HomeController@index');
Route::post('api/makejobdone/{id}', 'JobsController@makejobdone');
Route::post('api/recommendations/{categoryId}', 'RecommendationController@masters');
Route::get('api/categories', function (){
            return \App\Category::orderBy('name')->get();
//            if(!Cache::has('categories'))
//            {
//                $categories =  \App\Category::orderBy('name')->get();
//                \Cache::put('categories', $categories, 1440);
//            }
//
//            return \Cache::get('categories');
        });



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

Route::patch('editprofile/{userId}', 'ProfileController@update');



Route::group(['prefix' => 'master', 'middleware' => ['auth','master']], function(){
    Route::get('active/jobs', 'MastersController@getActiveJobs');
    Route::get('show/job/{jobId}', 'MastersController@show');
    Route::post('offer/for/{jobId}', 'OffersController@store');
    Route::get('profile', 'ProfileController@show');
    Route::post('profile/addphoto', 'ProfileController@savePhoto');
    Route::post('profile/addnewphoto', 'ProfileController@savePhotoProfile');
    Route::get('invites', 'InvitesController@all');
    Route::get('addphoto', 'ProfileController@addPhoto');
    Route::get('addskills', 'ProfileController@addSkills');
    Route::post('addskills', 'ProfileController@saveSkills');
    Route::get('attachments', 'ProfileController@attachments');
    Route::post('attachments', 'ProfileController@saveAttachments');
    Route::get('finish', 'ProfileController@finish');

});



Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){
    Route::get('manage', function () {
        return view('admin.manage');
    });
    Route::post('addCategories', 'AdminController@addcategory');
    Route::post('addCities', 'AdminController@addcity');
    Route::get('users', 'AdminController@users');

});



Route::post('addFeedback/{masterid}', 'FeedbackController@leave');
