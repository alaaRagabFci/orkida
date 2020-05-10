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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix'=>'adminpanel', 'middleware' => ['web'], 'namespace' => 'Admin'], function () {
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
    //Article types
    Route::Resource('/article_types', 'ArticleTypeController');
    //Question categories
    Route::Resource('/question_categories', 'QuestionCategoryController');
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
    //Pest bites
    Route::Resource('/pest_bites', 'PestBiteController');
    //Sliders
    Route::Post('/sliders/store', 'SliderController@store');
    Route::Post('/sliders/update', 'SliderController@update');
    Route::Resource('/sliders', 'SliderController');
    //Company valuables
    Route::Post('/company_valuables/store', 'CompanyValuableController@store');
    Route::Post('/company_valuables/update', 'CompanyValuableController@update');
    Route::Resource('/company_valuables', 'CompanyValuableController');
});

Route::group(['prefix' => LaravelLocalization::setLocale() , 'namespace' => 'Front', 'middleware' =>'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], function () {
    Route::GET('/', 'HomeController@home');
    Route::GET('/cc', 'HomeController@home');
    Route::get('contact-us', 'HomeController@contactUs');
    Route::POST('contact', 'HomeController@sendMessage');
    Route::GET('search', 'HomeController@search');
    Route::GET('site-search', 'HomeController@siteSearch');
    Route::GET('about-us', 'HomeController@aboutUs');
    Route::GET('faqs', 'HomeController@faqs');
    Route::GET('faqs/{slug}', 'HomeController@getQuestion');
    Route::GET('services', 'HomeController@services');
    Route::GET('services/{slug}', 'HomeController@getService');
    Route::GET('blog', 'HomeController@blogs');
    Route::GET('categories/{slug}', 'HomeController@blogsCategory');
    Route::GET('blog/{slug}', 'HomeController@blogDetails');
    Route::GET('blog/tags/{tag}', 'HomeController@matchedBlogsTags');
    Route::POST('user-opinion', 'HomeController@userOpinion');
});

Auth::routes();


