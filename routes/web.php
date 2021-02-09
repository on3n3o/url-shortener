<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ShortenController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/privacy-policy', PrivacyPolicyController::class)->name('privacy-policy');
Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.provider.callback');

Route::get('/features', [WelcomeController::class, 'features'])->name('features');

Route::post('/shorten', [ShortenController::class, 'store'])->name('shorten');
Route::get('/shorten', [ShortenController::class, 'redirect'])->name('shorten.redirect');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified', 'auth']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/link', LinkController::class);
    Route::get('/stats/{uuid}', [StatsController::class])->name('stats');
});


Route::get('/{short}', [RedirectController::class, 'redirect'])->name('redirect');
