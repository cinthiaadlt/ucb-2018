<?php
Auth::routes ();
Route::resource('/','ClienteController')->middleware('auth');
Route::resource('vehiculo','VehiculoController')->middleware('auth');
Route::get('/list','VehiculoController@list');
Route::get('/roles','RoleController@index');
Route::resource ('/tipoMultas', 'TipoMultaController')->middleware('auth');
Route::resource('parqueos','ParqueoController')->middleware('auth');
Route::resource('reservas','ReservaController')->middleware('auth');
Route::resource('usuarios', 'UsuarioController')->middleware('auth');
Route::resource('zona','ZonaController')->middleware('auth');
Route::resource('denuncia','DenunciaController')->middleware('auth');
Route::resource('cliente_busqueda','ClienteController')->middleware('auth');
Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index'])->middleware('auth');//Ruta de prueba no eliminar


// Dejo dos opciones para que veáis cómo implementar los middlewares para cada URL,
// Cambia ligeramente entre Route::get y Route::resource.
// Route::get ('adminOnly', function () {})->middleware('auth', 'admin');
// Route::resource ('pruebaRole', 'RoleController', ['middleware'=>['auth', 'owner']]);

// Hay tres middlewares básicos:
// admin
// owner
// user
// Cuando el usuario inicia sesión, el sistema ve el role que tiene y lo designa como
// admin, user u owner. En el ejemplo aparece el ejemplo de admin y owner.
// En el caso de la ruta "adminOnly", cuando un usuario intente entrar a la ruta, el middleware
// comprobará el role que tiene el usuario y, si tiene el rol de admin entrará a la ruta; sino,
// lo redireccionará a la ruta '/'
