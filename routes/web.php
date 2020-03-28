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

Route::get('/', 'HomeController@index')->name('blog.home');
Route::get('/articles', 'HomeController@articles')->name('blog.articles');
Route::get('/articles/{id}/show', 'HomeController@show')->name('blog.show');
Auth::routes();
Route::middleware('auth')->group(function () {
	Route::get('administrator', 'AdministratorController@index')->name('admin.home');
	Route::prefix('administrator')->group(function() {
		Route::post('all', 'AdministratorController@all')->name('admin.all');
		Route::post('new', 'AdministratorController@new')->name('admin.new');
		Route::post('create', 'AdministratorController@create')->name('admin.create');
		Route::post('upload', 'AdministratorController@upload')->name('admin.upload');
		Route::post('deleteArticle', 'AdministratorController@deleteArticle')->name('admin.deleteArticle');
		Route::post('edit', 'AdministratorController@edit')->name('admin.edit');
		Route::post('restore', 'AdministratorController@restore')->name('admin.restore');
		Route::post('permaDeleteArticle', 'AdministratorController@permaDeleteArticle')->name('admin.permaDeleteArticle');
		Route::post('media', 'AdministratorController@media')->name('admin.media');
		Route::post('uploadMedia', 'AdministratorController@uploadMedia')->name('admin.uploadMedia');
		Route::post('deleteMedia', 'AdministratorController@deleteMedia')->name('admin.deleteMedia');
		Route::post('category', 'AdministratorController@category')->name('admin.category');
		Route::post('deleteCategory', 'AdministratorController@deleteCategory')->name('admin.deleteCategory');
		Route::post('restoreCategory', 'AdministratorController@restoreCategory')->name('admin.restoreCategory');
		Route::post('permaDeleteCategory', 'AdministratorController@permaDeleteCategory')->name('admin.permaDeleteCategory');
		Route::post('newCategory', 'AdministratorController@newCategory')->name('admin.newCategory');		
		Route::post('createCategory', 'AdministratorController@createCategory')->name('admin.createCategory');
		Route::post('editCategory', 'AdministratorController@editCategory')->name('admin.editCategory');	
		Route::post('profile', 'UserController@profile')->name('admin.profile');
		Route::post('saveProfile', 'UserController@saveProfile')->name('admin.saveProfile');
		Route::post('loadMedia', 'AdministratorController@loadMedia')->name('admin.loadMedia');
		Route::post('show', 'AdministratorController@show')->name('admin.show');
	});
});
