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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','App\Http\Controllers\PagesController@index');

Route::get('/about','App\Http\Controllers\PagesController@about');
Route::get('/features','App\Http\Controllers\PagesController@features');

Route::get('/media','App\Http\Controllers\MediaController@index');

Route::delete('/media/{id}','App\Http\Controllers\MediaController@destory');






Route::resource("/Posts",'App\Http\Controllers\PostsController');




Route::get('/media/create','App\Http\Controllers\MediaController@create');
Route::post('/media','App\Http\Controllers\MediaController@store');

Route::get('/media/{id}','App\Http\Controllers\MediaController@show');
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
