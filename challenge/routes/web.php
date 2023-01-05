<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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
/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/configuracion', [App\Http\Controllers\UserController::class, 'config'])->name('config');

Route::get('/usuario/list', [App\Http\Controllers\UserController::class, 'listar'])->name('usuario.list');

Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');

Route::get('/perfil/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');


Route::get('/usuario/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('usuario.delete');
//rutas empresa

Route::get('/crear-empresa', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.crear');
Route::post('/empresa/save', [App\Http\Controllers\EmpresaController::class, 'save'])->name('empresa.save');
Route::get('/empresa/list', [App\Http\Controllers\EmpresaController::class, 'listar'])->name('empresa.list');
Route::get('/empresa/delete/{id}', [App\Http\Controllers\EmpresaController::class, 'delete'])->name('empresa.delete');
Route::get('/empresa/editar/{id}', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('empresa.editar');
Route::post('/empresa/update', [App\Http\Controllers\EmpresaController::class, 'update'])->name('empresa.update');


//rutas sucursal

Route::get('/crear-sucursal', [App\Http\Controllers\SucursalController::class, 'create'])->name('sucursal.crear');

Route::post('/sucursal/save', [App\Http\Controllers\SucursalController::class, 'save'])->name('sucursal.save');

Route::get('/sucursal/list', [App\Http\Controllers\SucursalController::class, 'listar'])->name('sucursal.list');
Route::get('/sucursal/delete/{id}', [App\Http\Controllers\SucursalController::class, 'delete'])->name('sucursal.delete');
Route::get('/sucursal/editar/{id}', [App\Http\Controllers\SucursalController::class, 'edit'])->name('sucursal.editar');

Route::post('/sucursal/update', [App\Http\Controllers\SucursalController::class, 'update'])->name('sucursal.update');

//rutas empleado
Route::get('/crear-empleado', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleado.crear');


Route::get('/api/empresa/{id}/sucursales', [App\Http\Controllers\EmpleadoController::class, 'byEmpresa']);

Route::post('/empleado/save', [App\Http\Controllers\EmpleadoController::class, 'save'])->name('empleado.save');
Route::get('/empleado/list', [App\Http\Controllers\EmpleadoController::class, 'listar'])->name('empleado.list');
Route::get('/empleado/delete/{id}', [App\Http\Controllers\EmpleadoController::class, 'delete'])->name('empleado.delete');
Route::get('/empleado/editar/{id}', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleado.editar');

Route::post('/empleado/update', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleado.update');
