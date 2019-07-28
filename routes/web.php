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

// Routes of api
  Route::resource('users', 'UserController') ;
  Route::resource('groups', 'GroupController') ;
  
  //check if user existe and actif
  Route::get('/cheek_user/{id}', 'UserController@check_user');