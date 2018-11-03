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

// Route::get('/', function () {
//     //return view('welcome');
//     return view('Home.index');
// });

use App\Jobs\SendMailRecruiterJob;
use App\Jobs\SendMailUserJob;
use App\Mail\SendEmailMailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/','UserController@index');

Route::get('/about', function (){

    //Mail::to('sanghit101@gmail.com')->send(new SendEmailMailable());
    return view('user.about');
});

Route::get('/category','UserController@category');
Route::get('/contact','UserController@contact');
Route::get('/blog','UserController@blog');
Route::get('/search','UserController@search');
Route::get('/details/{id}','UserController@details');
Route::get('/search','UserController@search');
Route::get('/search/{name_category}','UserController@search_category_quick');
//Route::get('/search/{text_find}/{area}/{name_category}','UserController@search_category_custom');
Route::post('/user/saved_jobs','UserController@saved_jobs');

Route::get('/applyJob', 'UserController@applyJob');
Route::post('/applyJob', 'UserController@applyJob');
Route::post('/my-career-center/my-profile','UserController@replace_resume_cv');
Route::post('/my-career-center/my-profile','DashboardController@user_unsave_job');

Route::get('/my-career-center/my-profile','DashboardController@index');


Route::get('/user/profile','DashboardController@user_profile');
Route::post('/user/profile','DashboardController@user_profile');
Route::get('/user/avatar','DashboardController@user_avatar');
Route::post('/user/avatar','DashboardController@user_avatar');
Route::post('/user/info','DashboardController@user_info');
Route::put('/user/contact','DashboardController@user_contact');
Route::post('/user/summary','DashboardController@user_summary');
Route::get('/user/summary','DashboardController@user_summary');
Route::get('/user/skills','DashboardController@user_skills');
Route::put('/user/skills','DashboardController@user_skills');
Route::get('/user/languages','DashboardController@user_languages');
Route::post('/user/languages','DashboardController@user_languages');
Route::put('/user/languages','DashboardController@user_languages');
Route::post('/user/languages/{id}','DashboardController@user_delete_languages');
Route::put('/user/employment_history','DashboardController@user_employment_history');
Route::post('/user/employment_history','DashboardController@user_employment_history');
Route::delete('/user/employment_history/{id}','DashboardController@user_delete_employment_history');
Route::put('/user/education_history','DashboardController@user_education_history');
Route::post('/user/education_history','DashboardController@user_education_history');
Route::delete('/user/education_history/{id}','DashboardController@user_delete_education_history');
Route::put('/user/working_preferences','DashboardController@user_working_preferences');
Route::get('/getT','DashboardController@getT');

Route::get('/get-database','DashboardController@get_data');
Route::get('/countries','DashboardController@get_countries_json');
Route::get('/provinces_cities','DashboardController@get_vietnam_provinces_cities_json');


Route::get('/admin/post_news','RecruitController@post_news');
Route::get('/admin/dashbroad','RecruitController@recruit_post_news');
Route::post('/admin/dashbroad/search','RecruitController@search_post');


Route::get('/admin/login','RecruitController@login');
Route::post('/admin/login','RecruitController@login');
Route::get('/admin/register','RecruitController@register');
Route::post('/admin/register','RecruitController@register');
Route::get('/admin/sign_out','RecruitController@sign_out');
Route::get('/admin/edit_post/{id}','RecruitController@edit_post');
Route::get('/admin/delete_post/{id}','RecruitController@delete_post');
Route::get('/admin/show_profile/{id}','RecruitController@show_profile');
Route::get('/admin/account-info','RecruitController@account_info');
Route::put('/admin/account-info','RecruitController@account_info');
Route::post('/admin/account-info','RecruitController@account_info');

Route::post('store','RecruitController@store');
Route::put('update/{id}','RecruitController@update');




Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
