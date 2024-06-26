<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\TutoresController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CursosController;

/* Empleados*/
Route::get('/empleados/gestion', [EmpleadosController::class, 'indexGestion'])->name('gestion-empleados');
Route::get('/empleados/reporte', [EmpleadosController::class, 'indexReporte'])->name('reporte-empleados');
/* Estudiantes*/
Route::get('/estudiantes/gestion', [EstudiantesController::class, 'indexGestion'])->name('gestion-estudiantes');
Route::get('/estudiantes/reporte', [EstudiantesController::class, 'indexReporte'])->name('reporte-estudiantes');
Route::post('/estudiantes', [EstudiantesController::class, 'store'])->name('estudiantes.store');
Route::get('/estudiantes/editar/{id}', [EstudiantesController::class, 'edit'])->name('editar-estudiantes');
Route::delete('/estudiantes/eliminar/{id}', [EstudiantesController::class, 'destroy'])->name('eliminar-estudiante');
Route::put('/estudiantes/actualizar/{id}', [EstudiantesController::class, 'update'])->name('actualizar-estudiante');
/* Tutores*/
Route::get('/tutores/gestion', [TutoresController::class, 'indexGestion'])->name('gestion-tutores');
Route::get('/tutores/reporte', [TutoresController::class, 'indexReporte'])->name('reporte-tutores');
Route::post('/tutores', [TutoresController::class, 'store'])->name('tutores.store');
Route::get('/tutores/editar/{id}', [TutoresController::class, 'edit'])->name('editar-tutores');
Route::delete('/tutores/eliminar/{id}', [TutoresController::class, 'destroy'])->name('eliminar-tutor');
Route::put('/tutores/actualizar/{id}', [TutoresController::class, 'update'])->name('actualizar-tutor');

/*Cursos */
Route::get('/cursos/gestion-curso', [CursosController::class, 'indexGestion'])->name('gestion-curso');
Route::get('/cursos/reporte-curso', [CursosController::class, 'indexReporte'])->name('reporte-curso');
Route::post('/cursos', [CursosController::class, 'store'])->name('curso.store');
Route::get('/cursos/editar/{id}', [CursosController::class, 'edit'])->name('editar-curso');
Route::delete('/cursos/eliminar/{id}', [CursosController::class, 'destroy'])->name('eliminar-curso');
Route::put('/cursos/actualizar/{id}', [CursosController::class, 'update'])->name('actualizar-curso');

/* Usuarios*/
// Rutas para usuarios
Route::get('/usuarios', [UsuariosController::class, 'index'])
->name('gestion-usuarios');
Route::get('usuarios/nuevo', [UsuariosController::class, 'create'])
->name('nuevo-usuario');
Route::get('editar-usuario/{id}', [UsuariosController::class, 'edit'])
->name('editar-usuarios');
Route::put('usuarios/actualizar/{id}', [UsuariosController::class, 'update'])
->name('actualizar-usuario');
Route::post('usuarios/store', [UsuariosController::class, 'store'])
->name('crear-usuario');
Route::delete('usuarios/eliminar/{id}', [UsuariosController::class, 'destroy'])
->name('eliminar-usuario');



Route::get('/pagos/index', [PagosController::class, 'index'])->name('index-pagos');


/*Q
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Lo que ya viene de la planilla esta aqui abajo
Route::get('/', function () {
	return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;


Route::get('/', function () {
	return redirect('sign-in'); })->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});