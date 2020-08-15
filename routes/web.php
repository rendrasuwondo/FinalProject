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

// Route Jawaban 
Route::resource('jawaban', 'JawabanController');


Route::middleware('auth')->group(function () {
    // Route Pertanyaan Komen 
    Route::resource('pertanyaan-komen', 'PertanyaanKomenController');
    // Route::resource('jawaban', 'JawabanController');
    // Route::resource('jawaban-komen', 'JawabanKomenController');
    // Route::resource('jawaban-like', 'JawabanLikeControlller');
    // Route::resource('pertanyaan-like', 'PertanyaanLikeControlller');
    // Route::resource('user', 'UserController');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//VOTE====================
Route::get('/getmsg/{id}', 'AjaxController@index');
Route::get('/pertanyaanUp/{id}', 'AjaxController@pertanyaanUp');
Route::get('/pertanyaanDown/{id}', 'AjaxController@pertanyaanDown');
Route::get('/jawabanUp/{id}/{id2}', 'AjaxController@jawabanUp');
Route::get('/jawabanDown/{id}/{id2}', 'AjaxController@jawabanDown');
//VOTE==================== END
