<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//public
Route::get('/', 'HomeController@index');

// Authentication
Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');

// Admin-Routes
Route::group(array('before' => 'auth'), function()
{
    Route::get('admin', 'HomeController@showAdmin');
    Route::get('peta/response',['uses' => 'PetaController@response']);
    Route::post('peta/simpan',['uses' => 'PetaController@simpan']);
    Route::get('islands/import','IslandsController@import');
    Route::post('islands/port','IslandsController@port');
    Route::resource('islands', 'IslandsController');
    Route::resource('provinces', 'ProvincesController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('posts', 'PostsController');
    Route::resource('slideshows', 'SlideshowsController');
    Route::resource('peta','PetaController');
});











