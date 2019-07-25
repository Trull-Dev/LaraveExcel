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

//INDEX
Route::get('/', 'EntrepriseController@index');

//EXPORT
Route::get('export', 'EntrepriseController@export')->name('export');

//IMPORT
Route::post('import', 'EntrepriseController@import')->name('import');


Route::delete('delete/{id}', 'EntrepriseController@destroy')->name('delete');
