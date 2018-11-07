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

Route::resource('vehiculo','VehiculoController');
Route::get('/list','VehiculoController@list');

Route::resource ('/tipoMultas', 'TipoMultaController');

Route::resource('parqueo','ParqueoController');

Route::resource('usuarios', 'UsuarioController');

Route::resource('zona','ZonaController');

Route::resource('cliente_busqueda','ClienteController');
