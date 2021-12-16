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

Route::get('/', 'HomeController@index')->name('home');
Route::get('peserta', 'PesertaController@index')->name('peserta');
Route::get('peserta.create', 'PesertaController@create')->name('peserta.create');
Route::post('peserta', 'PesertaController@store')->name('peserta.store');
Route::get('peserta/{peserta}', 'PesertaController@edit')->name('peserta.edit');
Route::put('peserta/{peserta}', 'PesertaController@update')->name('peserta.update');
Route::delete('peserta/delete/{peserta}', 'PesertaController@destroy')->name('peserta.delete');
Route::get('peserta/report/{peserta}', 'PesertaController@report')->name('peserta.report');
