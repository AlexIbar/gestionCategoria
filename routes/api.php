<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/rol', [RolController::class, 'getAll']);
Route::get('/rol/{id}', [RolController::class, 'getById']);
Route::post('/rol', [RolController::class, 'createRol']);
Route::put('/rol/{id}', [RolController::class, 'updateRol']);
Route::delete('/rol/{id}', [RolController::class, 'deleteRol']);

Route::get('/categoria', [CategoriaController::class, 'getAll']);
Route::get('/categoria/{id}', [CategoriaController::class, 'getById']);
Route::post('/categoria', [CategoriaController::class, 'createCategoria']);
Route::put('/categoria/{id}', [CategoriaController::class, 'updateCategoria']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'deleteCategoria']);

Route::get('/usuario', [UsuarioController::class, 'getAll']);
Route::get('/usuario/{id}', [UsuarioController::class, 'getById']);
Route::post('/usuario', [UsuarioController::class, 'createUser']);
Route::put('/usuario/{id}', [UsuarioController::class, 'updateUser']);
Route::delete('/usuario', [UsuarioController::class, 'deleteUser']);

Route::get('/post', [PostController::class, 'getAll']);
Route::get('/post/{id}', [PostController::class, 'getById']);
Route::post('/post', [PostController::class, 'createPost']);
Route::put('/post/{id}', [PostController::class, 'updatePost']);
Route::delete('/post', [PostController::class, 'deletePost']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
