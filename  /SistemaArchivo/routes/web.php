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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes

Route::middleware(['auth'])->group(function(){
	//Roles
	Route::resource('roles', 'RoleController');

	//Carreras
	Route::post('carreras/store', 'CarreraController@store')->name('carreras.store')->middleware('permission:carreras.create');

	Route::get('carreras', 'CarreraController@index')->name('carreras.index')->middleware('permission:carreras.index');

	Route::get('carreras/create', 'CarreraController@create')->name('carreras.create')->middleware('permission:carreras.create');

	Route::put('carreras/{carrera}', 'CarreraController@update')->name('carreras.update')->middleware('permission:carreras.edit');

	Route::get('carreras/{carrera}/edit', 'CarreraController@edit')->name('carreras.edit')->middleware('permission:carreras.edit');

	//Usuarios

	Route::get('usuarios/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');

	Route::put('usuarios/{user}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');

	Route::get('usuarios', 'UserController@index')->name('users.index')->middleware('permission:users.index');

	Route::get('usuario/create', 'UserController@create')->name('users.create')->middleware('permission:users.create');

	Route::post('usuario/store', 'UserController@store')->name('users.store')->middleware('permission:users.create');

	Route::post('usuario/{user}/reset', 'UserController@reset')->name('users.reset');




	//Archivos
	Route::post('archivos/store', 'ArchivoController@store')->name('archivos.store')->middleware('permission:archivos.create');

	Route::get('archivos', 'ArchivoController@index')->name('archivos.index')->middleware('permission:archivos.index');

	Route::get('archivos/create', 'ArchivoController@create')->name('archivos.create')->middleware('permission:archivos.create');

	Route::put('archivos/{archivo}', 'ArchivoController@update')->name('archivos.update')->middleware('permission:archivos.edit');

	Route::get('archivos/{archivo}', 'ArchivoController@show')->name('archivos.show')->middleware('permission:archivos.show');

	Route::delete('archivos/{archivo}', 'ArchivoController@destroy')->name('archivos.destroy')->middleware('permission:archivos.destroy');

	Route::get('archivos/{archivo}/edit', 'ArchivoController@edit')->name('archivos.edit')->middleware('permission:archivos.edit');

	//Gavetas
	Route::post('gavetas/store', 'GavetaController@store')->name('gavetas.store')->middleware('permission:gavetas.create');

	Route::get('gavetas', 'GavetaController@index')->name('gavetas.index')->middleware('permission:gavetas.index');

	Route::get('gavetas/create', 'GavetaController@create')->name('gavetas.create')->middleware('permission:gavetas.create');

	Route::put('gavetas/{gaveta}', 'GavetaController@update')->name('gavetas.update')->middleware('permission:gavetas.edit');

	Route::get('gavetas/{gaveta}', 'GavetaController@show')->name('gavetas.show')->middleware('permission:gavetas.show');

	Route::delete('gavetas/{gaveta}', 'GavetaController@destroy')->name('gavetas.destroy')->middleware('permission:gavetas.destroy');

	Route::get('gavetas/{gaveta}/edit', 'GavetaController@edit')->name('gavetas.edit')->middleware('permission:gavetas.edit');

	//Estudiantes
	Route::post('estudiantes/store', 'EstudianteController@store')->name('estudiantes.store')->middleware('permission:estudiantes.create');

	Route::get('estudiantes', 'EstudianteController@index')->name('estudiantes.index')->middleware('permission:estudiantes.index');

	Route::get('estudiantes/create', 'EstudianteController@create')->name('estudiantes.create')->middleware('permission:estudiantes.create');

	Route::put('estudiantes/{estudiante}', 'EstudianteController@update')->name('estudiantes.update')->middleware('permission:estudiantes.edit');

	Route::get('estudiantes/{estudiante}', 'EstudianteController@show')->name('estudiantes.show')->middleware('permission:estudiantes.show');

	Route::get('estudiantes/{estudiante}/edit', 'EstudianteController@edit')->name('estudiantes.edit')->middleware('permission:estudiantes.edit');


//Expedientes
	Route::post('expedientes/store', 'ExpedienteController@store')->name('expedientes.store')->middleware('permission:expedientes.create');

	Route::get('expedientes', 'ExpedienteController@index')->name('expedientes.index')->middleware('permission:expedientes.index');

	Route::get('expedientes/create', 'ExpedienteController@create')->name('expedientes.create')->middleware('permission:expedientes.create');

	Route::put('expedientes/{expediente}', 'ExpedienteController@update')->name('expedientes.update')->middleware('permission:expedientes.edit');

	Route::get('expedientes/{expediente}', 'ExpedienteController@show')->name('expedientes.show')->middleware('permission:expedientes.show');

	Route::delete('expedientes/{expediente}', 'ExpedienteController@destroy')->name('expedientes.destroy')->middleware('permission:expedientes.destroy');

	Route::get('expedientes/{expediente}/edit', 'ExpedienteController@edit')->name('expedientes.edit')->middleware('permission:expedientes.edit');

	Route::post('expedientes/search', 'ExpedienteController@search')->name('expedientes.search');

// Reportes
	Route::get('informes', 'ReporteController@index')->name('reportes');
	Route::get('informes/semanal', 'ReporteController@semanal')->name('semanal');
	Route::get('informes/semanal/descargar', 'ReporteController@semanalD')->name('semanalD');
	Route::get('informes/mensual', 'ReporteController@mensual')->name('mensual');
	Route::get('informes/mensual/descargar', 'ReporteController@mensualD')->name('mensualD');
	Route::get('informes/anual', 'ReporteController@anual')->name('anual');
	Route::get('informes/anual/descargar', 'ReporteController@anualD')->name('anualD');
});
