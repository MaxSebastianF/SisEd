<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Empleados\EmpleadoController;
use App\Http\Controllers\Estudiantes\EstudianteController;
use App\Http\Controllers\Pagos\PagoController;


Route::get('/empleados/gestion', [EmpleadoController::class, 'gestion'])->name('empleados.gestion');
Route::get('/empleados/reportes', [EmpleadoController::class, 'reportes'])->name('empleados.reportes');

Route::get('/estudiantes/gestion', [EstudianteController::class, 'gestion'])->name('estudiantes.gestion');
Route::get('/estudiantes/reportes', [EstudianteController::class, 'reportes'])->name('estudiantes.reportes');

Route::get('/pagos/realizar', [PagoController::class, 'index'])->name('pagos.index');

// 
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

