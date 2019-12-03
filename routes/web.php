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
//Route::get('/firebase', 'FirebaseController@index');
//Route::get('/home', 'HomeController@index');
//Route::get('/home/create', 'HomeController@create');
//Route::get('/home/{id}/edit', 'HomeController@edit');
//Route::get('/home/{id}/destroy', 'HomeController@destroy');
//Route::get('/firestore', 'FirestoreController@index');
//Route::get('/firestore/create', 'FirestoreController@create');
//Route::get('/firestore/{id}/edit', 'FirestoreController@edit');
//Route::get('/firestore/{id}/destroy', 'FirestoreController@destroy');
//Route::get('/firestore/show', 'FirestoreController@show');
Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users/update/{id}', 'UserController@update');
Route::get('/users/hapus/{id}', 'UserController@destroy');