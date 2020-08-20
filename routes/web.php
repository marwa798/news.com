<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', 'pagesController@about');

//Route::get('/news', function () {
//    return view('pages.news');
//});

//Route::get('/profile', function () {
//    return view('pages.profile');
//});

Route::get('/news','postController@index');


Route::get('/news/create','postController@create');
Route::post('/news/store','postController@store');

Route::get('/news/{post}','postController@show');

Route::get('/news/{id}/edit','postController@edit');
Route::put('/news/{id}/update','postController@update');

Route::get('/news/{id}/delete','postController@destroy');




Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'pagesController@profile');

//update profile
Route::get('/profile/edit','pagesController@edit');
Route::put('/profile/update','pagesController@update');

//change password
Route::get('/profile/changePassword','pagesController@changePassword');
Route::put('/profile/updatePassword','pagesController@updatePassword');


//comments
Route::post('/news/{id}/comment','CommentsController@store');
