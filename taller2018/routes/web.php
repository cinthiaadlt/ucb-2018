<?php
Auth::routes ();

// Rutas de Admin:
Route::resource ('/tipoMultas', 'TipoMultaController')->middleware('auth');
Route::resource('/roles','RoleController', ['middleware'=>['auth', 'admin']]);
Route::resource('/users','UsersRoleController', ['middleware'=>['auth', 'admin']]);
Route::resource('parqueo_admin','ParqueoAdminController',['middleware' => ['auth', 'admin']]);


// Rutas de User;
Route::resource('/','ClienteController', ['middleware'=>['auth', 'user']]);
Route::resource('cliente','ClienteController', ['middleware'=>['auth', 'user']]);
Route::resource('vehiculo','VehiculoController', ['middleware'=>['auth', 'user']]);
Route::get('makeMeUser','UsersRoleController@makeMeUser', ['middleware'=>['auth']]);
Route::resource('reservas','ReservaController', ['middleware' => ['auth', 'user']]);

//Route::get('/parqueos/edit', 'ParqueoController@getParqueoEdit');
//Route::post('/parqueos/edit', 'ParqueoController@postParqueoEdit');

// no estoy seguro:
Route::resource('denuncia','DenunciaController')->middleware('auth'); // ??????
//Route::get('/', 'DenunciaController@show')->name('denuncias');
Route::get('/list','VehiculoController@list');
Route::resource('validacion','ValidacionController')->middleware('auth');
Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index'])->middleware('auth');//Ruta de prueba no eliminar
Route::resource('cliente_busqueda','ClienteController')->middleware('auth');

// Rutas de Owner
Route::resource('zona','ZonaController',['middleware' => ['auth', 'owner']]);
Route::resource('parqueos','ParqueoController',['middleware' => ['auth', 'owner']]);
Route::resource('reservasanfitrion','ReservaAnfitrionController')->middleware('auth',['middleware' => ['auth', 'owner']]);

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
