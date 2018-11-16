<?php
Auth::routes ();
Route::resource('/','ClienteController', ['middleware'=>['auth', 'user']]);
Route::resource('vehiculo','VehiculoController')->middleware('auth');
Route::get('/list','VehiculoController@list');
Route::get('/roles','RoleController@index');
Route::resource ('/tipoMultas', 'TipoMultaController')->middleware('auth');
Route::resource('parqueos','ParqueoController')->middleware('auth');
<<<<<<< HEAD
Route::get('/parqueos/edit', 'ParqueoController@getParqueoEdit');
Route::post('/parqueos/create', 'ParqueoController@create');
Route::resource('reservas','ReservaController')->middleware('auth');
=======
//Route::get('/parqueos/edit', 'ParqueoController@getParqueoEdit');
//Route::post('/parqueos/edit', 'ParqueoController@postParqueoEdit');
Route::resource('reservas','ReservaController', ['middleware'=>['auth', 'owner']]);
>>>>>>> 1ed9972207447ea6ef41013fde39ece0a779ec69
Route::resource('usuarios', 'UsuarioController')->middleware('auth');
Route::resource('zona','ZonaController')->middleware('auth');
Route::resource('denuncia','DenunciaController')->middleware('auth');
Route::resource('cliente_busqueda','ClienteController')->middleware('auth');
Route::resource('validacion','ValidacionController')->middleware('auth');
Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index'])->middleware('auth');//Ruta de prueba no eliminar
Route::get ('adminOnly', function () {})->middleware('auth', 'admin');
Route::get ('userOnly', function () {})->middleware('auth', 'user');

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
