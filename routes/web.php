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

//This will force user to login in order to use the system.
//using group and middleware.
Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return redirect('/notebooks');
    })->name('index');

    Route::get('/notebooks','NotebooksController@index')->name('notebooks.index');
    Route::post('/notebooks','NotebooksController@store');

    Route::get('/notebooks/create','NotebooksController@loadCreateModal')->name('notebooks.create');
    Route::get('/notebooks/{notebookID}','NotebooksController@show')->name('notebooks.show');
    Route::get('/notebooks/rename/{id}','NotebooksController@loadEditModal')->name('notebooks.rename');
    Route::post('/notebooks/search','NotebooksController@search')->name('notebooks.search');

    Route::put('/notebooks/{notebookID}','NotebooksController@update')->name('notebooks.update');
    Route::delete('/notebooks/{notebookID}','NotebooksController@delete');


    Route::resource('notes','NotesController');
    Route::get('notes/{note}/history/','NotesController@showHistory')->name('notes.history');

    Route::get('notes/{notebookID}/createNote','NotesController@createNote')->name('notes.createNote');
});

//Session Test
Route::get('/session/set/{data}','SessionController@setSession');
Route::get('/session/show','SessionController@getSession');

//Route::get('/home/{param}','TestController@test');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route For get user uploaded image
Route::get('/storage/uploads/{filename}','ImgController@getImg');