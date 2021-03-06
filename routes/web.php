<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//Route::get('tests/test', 'App\Http\Controllers\TestController@index');
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news/edit', 'Admin\NewsController@edit')->name('news.edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::post('news/delete', 'Admin\NewsController@delete')->name('news.delete');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/show', 'Admin\NewsController@show')->name('news.show');
    });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/index', 'Admin\ProfileController@index');
    Route::post('profile/delete', 'Admin\ProfileController@delete')->name('profile.delete');
});

Auth::routes();
Route::get('/', 'NewsController@index');