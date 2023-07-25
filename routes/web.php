<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});


Route::get('/rekap', function () {
    return view('rekap');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'TourController@dashboard')->name('dashboard');
Route::post('/check-pass', 'TourController@checkPass')->name('check.pass');
Route::post('/submit-answers', 'TourController@submitAnswers')->name('submit.answers');
