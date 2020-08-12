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

Route::get('/news', function () {
    return view('pages.news');
});

Route::get('/add', function () {
    return view('pages.add');
});

Route::get('/profile', function () {
    return view('pages.profile');
});

Route::get('/githup', function () {
    return "Git hup";
});



