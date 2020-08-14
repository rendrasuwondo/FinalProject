<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route Pertanyaan 
Route::resource('pertanyaan', 'PertanyaanController');

Route::middleware('auth')->group(function(){
    // Route::resource('jawaban', 'JawabanController');
    // Route::resource('jawaban-komen', 'JawabanKomenController');
    // Route::resource('pertanyaan-komen', 'PertanyaanKomenControlller');
    // Route::resource('jawaban-like', 'JawabanLikeControlller');
    // Route::resource('pertanyaan-like', 'PertanyaanLikeControlller');
    // Route::resource('user', 'UserController');
});