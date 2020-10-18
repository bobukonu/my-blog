<?php

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

Route::get('/', [
  'uses' => 'BlogController@index',
  'as'   => 'blog'
]);

Route::get('blog/{post}', [
  'uses' => 'BlogController@show',
  'as'   => 'blog.shows'
]);

Route::get('/category/{category}', [
  'uses' => 'BlogController@category',
  'as'   => 'category'
]);

Route::post('/blog/{post}/comments', [
  'uses' => 'CommentsController@store',
  'as'  => 'blog.comments'
]);

Route::get('/author/{author}', [
  'uses' => 'BlogController@author',
  'as'   => 'author'
]);
Route::get('/tag/{tag}', [
  'uses' => 'BlogController@tag',
  'as'   => 'tag'
]);

Auth::routes();

Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::get('/admin/edit-account', 'Admin\DashboardController@edit');
Route::put('/admin/edit-account', 'Admin\DashboardController@update');

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('logout', 'Auth\LoginController@logout');

Route::put('blog/restore/{blog}', [
  'uses' => 'Admin\BlogController@restore',
  'as'   => 'blog.restore'
]);

Route::delete('blog/force-destroy/{blog}', [
  'uses' => 'Admin\BlogController@forceDestroy',
  'as'   => 'blog.force-destroy'
]);


Route::resource('/admin/blog', 'Admin\BlogController');

Route::resource('/admin/categories', 'Admin\CategoriesController');

Route::get('users/confirm/{users}', [
  'uses' => 'Admin\UsersController@confirm',
  'as' => 'users.confirm'
]);

Route::resource('/admin/users', 'Admin\UsersController');
