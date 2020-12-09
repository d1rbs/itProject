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

        /*---------------------View Admin----------------------*/
    Route::group(['namespace'=>'Admin'], function(){
        /*Create teams*/
    Route::get('admin/teams/create', 'TeamsController@create');
    Route::post('admin/teams/create', 'TeamsController@create');

        /*Index games*/
    Route::get('admin/games/index', 'GamesController@index');
    Route::post('admin/games/index', 'GamesController@index');

        /*Create games*/
    Route::get('admin/games/create', 'GamesController@create');
    Route::post('admin/games/create', 'GamesController@create');

        /*Update games*/
     Route::get('admin/games/update/{id}', 'GamesController@update');
     Route::post('admin/games/update/{id}', 'GamesController@update');
    });




        /*---------------------View FRONT----------------------*/
        /*View welcome and home*/
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');

        /*View Auth*/
    Auth::routes();

        /*Index games*/
    Route::get('games/index', 'GamesController@index');
    Route::post('games/index', 'GamesController@index');

        /*View games*/
    Route::get('games/view/{id}', 'GamesController@view');
    Route::post('games/view/{id}', 'GamesController@view');


