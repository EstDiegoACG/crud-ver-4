<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Con esto entramos al controlador para ejecutar la clase index, que mostrara todos los registros
Route::get('/crudToys', [CrudController::class,"index"])->name ("crud.index");

//Con esta ruta añadimos un producto
Route::post('/crudToys/registrarProducto', [CrudController::class,"create"])->name ("crud.create");

//Ruta para modificar datos
Route::post('/crudToys/ModificarProducto', [CrudController::class,"update"])->name ("crud.update");

//Ruta para eliminar datos
Route::get('/crudToys/eliminarProducto-{id}', [CrudController::class,"delete"])->name ("crud.delete");