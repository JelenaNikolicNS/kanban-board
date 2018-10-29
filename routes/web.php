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

Route::get('/', 'StateController@index');

// Inserting and updating states(columns)
Route::get('/add_state', 'StateController@add');
Route::post('/state', 'StateController@insert');

Route::get('/edit_state/{id}', 'StateController@edit');
Route::post('/update_state/{id}', 'StateController@update');

Route::get('/delete/{id}', 'StateController@delete');

