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

Route::resource('/','LoginController');
Route::resource('login','LoginController');
Route::resource('signup','SignupController');

Route::resource('vehiculo','VehiculoController');
Route::get('/list','VehiculoController@list');

Route::resource ('/tipoMultas', 'TipoMultaController');

Route::resource('parqueos','ParqueoController');

Route::resource('usuarios', 'UsuarioController');

Route::resource('zona','ZonaController');

Route::resource('cliente_busqueda','ClienteController');

Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index']);//Ruta de prueba no eliminar