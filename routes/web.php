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
Auth::routes();
Route::middleware('auth')->group(function () {
	Route::get('administrator', 'AdministratorController@index')->name('admin.home');
	Route::prefix('administrator')->group(function() {
		Route::get('all', 'AdministratorController@all')->name('admin.all');
	});
});
