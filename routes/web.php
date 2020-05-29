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

Route::get('/', 'WelcomeController@index');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/features', 'WelcomeController@features')->name('features');

Route::post('/shorten', 'ShortenController@store')->name('shorten');

Route::get('/shorten', 'ShortenController@redirect')->name('shorten.redirect');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified', 'auth']], function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    //Route::resource('/link', 'LinkController');
    Route::get('/stats/{uuid}', 'StatsController')->name('stats');
});


Route::get('/{short}', 'RedirectController@redirect');
