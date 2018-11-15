<?php
Route::resource('/','ClienteController')->middleware('auth');
Route::resource('vehiculo','VehiculoController')->middleware('auth');
Route::get('/list','VehiculoController@list');
Route::resource ('/tipoMultas', 'TipoMultaController')->middleware('auth');
Route::resource('parqueos','ParqueoController')->middleware('auth');
//Route::get('/parqueos/edit', 'ParqueoController@getParqueoEdit');
//Route::post('/parqueos/edit', 'ParqueoController@postParqueoEdit');
Route::resource('reservas','ReservaController')->middleware('auth');
Route::resource('usuarios', 'UsuarioController')->middleware('auth');
Route::resource('zona','ZonaController')->middleware('auth');
Route::resource('denuncia','DenunciaController')->middleware('auth');
Route::resource('cliente_busqueda','ClienteController')->middleware('auth');
Route::resource('validacion','ValidacionController')->middleware('auth');
Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index'])->middleware('auth');//Ruta de prueba no eliminar
Auth::routes ();
