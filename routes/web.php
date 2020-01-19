<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Adminpanel
Route::group(['prefix'=>'adminpanel', 'middleware' => ['web']], function () {
    //Dashboard
    Route::GET('/', 'UserController@dashboard');
    //Profile
    Route::get('/profile/{id}' , 'UserController@profile');
    Route::post('/updateProfile' ,'UserController@updateProfile');
    Route::post('/setAvatar' , 'UserController@updateAdminImage');
    Route::post('/setPassword' , 'UserController@setPassword');
    //Settings
    Route::Post('/settings/update', 'SettingController@update');
    Route::Resource('/settings', 'SettingController');
    //Site phones
    Route::Resource('/site_phones', 'SitePhoneController');
    //Categories
    Route::Resource('/categories', 'CategoryController');
    //Users
    Route::Resource('/users', 'UserController');
    //Ads
    Route::Resource('/ads', 'AdController');
    //Faqs
    Route::Resource('/faqs', 'FaqController');
});

Auth::routes();


