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
    Route::post('ckeditor/image_upload', 'CkeditorController@upload')->name('upload');
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
    //Site phones
    Route::Resource('/article_types', 'ArticleTypeController');
    //Categories
    Route::Resource('/categories', 'CategoryController');
    //Users
    Route::Resource('/users', 'UserController');
    //Orders
    Route::Resource('/orders', 'OrderController');
    //Messages
    Route::Resource('/messages', 'MessageController');
    //Ads
    Route::Resource('/ads', 'AdController');
    //Faqs
    Route::Resource('/faqs', 'FaqqController');
    //Blogs
    Route::Resource('/blogs', 'BlogController');
    Route::Post('/blogs/sort', 'BlogController@sortBlogs');
    //Services
    Route::Resource('/services', 'OurServiceController');
    Route::Post('/services/sort', 'OurServiceController@sortServices');
    //About us
    Route::Resource('/about_us', 'AboutUsController');
    //Pest libraries
    Route::Resource('/pest_libraries', 'PestLibraryController');
    Route::Post('/pest_libraries/sort', 'PestLibraryController@sortPestLibrariesTypes');
    //Sliders
    Route::Post('/sliders/store', 'SliderController@store');
    Route::Post('/sliders/update', 'SliderController@update');
    Route::Resource('/sliders', 'SliderController');
    //Company valuables
    Route::Post('/company_valuables/store', 'CompanyValuableController@store');
    Route::Post('/company_valuables/update', 'CompanyValuableController@update');
    Route::Resource('/company_valuables', 'CompanyValuableController');
});

Auth::routes();


