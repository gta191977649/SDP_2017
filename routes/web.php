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
    return view('frontpage');
});


Route::get('/notebooks','NotebooksController@index');
Route::post('/notebooks','NotebooksController@store');

Route::get('/notebooks/create','NotebooksController@create');
Route::get('/notebooks/{notebookID}','NotebooksController@edit');
Route::put('/notebooks/{notebookID}','NotebooksController@update');
Route::delete('/notebooks/{notebookID}','NotebooksController@delete');


//Route::get('/home/{param}','TestController@test');

