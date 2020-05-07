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

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login', 'LoginController@showLoginForm')->name('login');
	Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');

	Route::get('/auth/logout', 'LoginController@logout')->name('logout');

	Route::post('/auth/login', 'LoginController@login')->name('auth.login');
	Route::post('/auth/register', 'RegisterController@register')->name('auth.register');
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
