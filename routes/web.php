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

Route::get('/features', 'WelcomeController@features')->name('features');

Route::post('/shorten', 'ShortenController@store')->name('shorten');

Route::get('/shorten', 'ShortenController@redirect')->name('shorten.redirect');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/link', 'LinkController');

Route::get('/{short}', 'RedirectController@redirect');
