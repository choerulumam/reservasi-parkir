<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServioceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('member')->group(function(){
	Route::get('/', 'HomeController@index');
	Route::get('/slot', 'HomeController@slot');
	Route::get('/slot/api/', 'HomeController@slotuser');
	Route::post('/slot/api/booking', 'ApiUserController@booking');
	Route::post('/slot/api/booking/delete', 'ApiUserController@deletebooking');
	Route::get('/slot/logs', 'ApiUserController@logs');
	Route::get('/slot/logs/data', 'ApiUserController@logsview');
	Route::get('/profile', 'UserProfileController@index');
	Route::get('/monitoring', 'HomeController@monitoring');
});

Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/user', 'ApiCrudUserController@index');
	Route::post('/user/update', 'ApiCrudUserController@update');
	Route::post('/user/delete', 'ApiCrudUserController@delete');
	Route::post('/user/create', 'ApiCrudUserController@create');
	Route::get('/user/export', 'ApiCrudUserController@export');
});

