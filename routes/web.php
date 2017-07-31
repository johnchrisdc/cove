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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin side
Route::get('/admin', 'AdminController@index')->name('admin');

//Users
Route::get('/admin/users', 'AdminController@users')->name('users');

//Groups
Route::get('/admin/groups', 'AdminController@groups')->name('groups');
//Create new Group
Route::post('/admin/groups', 'AdminController@new_group')->name('new_group');

//Leader
//Make a user a leader
Route::post('/admin/leader/{user_id}', 'AdminController@make_leader')->name('make_leader');
