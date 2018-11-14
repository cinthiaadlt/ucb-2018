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

Route::resource('/','ClienteController')->middleware('auth');
// Route::resource('login','LoginController');
// Route::resource('signup','SignupController');

Route::resource('vehiculo','VehiculoController')->middleware('auth');
Route::get('/list','VehiculoController@list');

Route::resource ('/tipoMultas', 'TipoMultaController')->middleware('auth');

Route::resource('parqueos','ParqueoController')->middleware('auth');

Route::resource('usuarios', 'UsuarioController')->middleware('auth');

Route::resource('zona','ZonaController')->middleware('auth');

Route::resource('denuncia','DenunciaController')->middleware('auth');

Route::resource('cliente_busqueda','ClienteController')->middleware('auth');

Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index'])->middleware('auth');//Ruta de prueba no eliminar

Auth::routes ();
