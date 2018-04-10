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

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('home');
	Route::post('imoveis', 'ImoveisController@search')->name('imovel.search');
	Route::get('imoveis', 'ImoveisController@index')->name('imoveis');
	Route::get('imovel/create', 'ImoveisController@create')->name('imovel.create');
	Route::post('imovel/create', 'ImoveisController@store')->name('imovel.store');
	Route::get('import', 'ImoveisController@import');
	Route::post('import', 'ImoveisController@importImoveis')->name('imovel.import');
	Route::put('imovel/{id}/edit', 'ImoveisController@update')->name('imovel.update');
	Route::get('imovel/{id}/edit', 'ImoveisController@edit')->name('imovel.edit');
	Route::delete('imovel/{id}', 'ImoveisController@destroy')->name('imovel.destroy');

});

Route::get('/', 'SiteController@index')->name('home');

Auth::routes();


