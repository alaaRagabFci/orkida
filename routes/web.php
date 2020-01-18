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
    Route::GET('/dashboard', 'UserController@index');
    //Profile
    Route::get('/profile/{id}' , 'UserController@profile');
    Route::post('/updateUser' ,'UserController@updateUser');
    Route::post('/setAvatar' , 'UserController@updateAdminImage');
    Route::post('/setPassword' , 'UserController@setPassword');
    //Settings
    Route::Post('/settings/update', 'SettingController@update');
    Route::Resource('/settings', 'SettingController');
});

Auth::routes();


