<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;

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

//Rutas de curso: Ruta de Lista
Route::get('/', [customerController::class,'listaCustomer'])->name('listaCustomer');


//Ruta de Formulario Guardar
Route::get('/formCustomer', [customerController::class,'formCustomer']);

//Ruta para Guardar al categoryController
Route::post('/customer/crearCustomer', [customerController::class,'saveCustomer'])->name('Customer.save');

//Ruta de Formulario Editar
Route::get('/editformCustomer/{id}', [customerController::class,'editformCustomer'])->name('editformCustomer');

//Ruta para Editar
Route::patch('/editCustomer/{id}', [customerController::class, 'editCustomer'])->name('editCustomer');

//Ruta para Eliminar
Route::delete('/deleteCustomer/{id}', [customerController::class,'destroy'])->name('deleteCustomer');
