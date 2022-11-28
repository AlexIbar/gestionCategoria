<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth;
use App\Http\Middleware\Admin;

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

Route::get('/rol', [RolController::class, 'getAll'])->middleware(Admin::class);
Route::get('/rol/{id}', [RolController::class, 'getById'])->middleware(Admin::class);
Route::post('/rol', [RolController::class, 'createRol'])->middleware(Admin::class);
Route::put('/rol/{id}', [RolController::class, 'updateRol'])->middleware(Admin::class);
Route::delete('/rol/{id}', [RolController::class, 'deleteRol'])->middleware(Admin::class);

Route::get('/categoria', [CategoriaController::class, 'getAll'])->middleware(Admin::class);
Route::get('/categoria/{id}', [CategoriaController::class, 'getById'])->middleware(Admin::class);
Route::post('/categoria', [CategoriaController::class, 'createCategoria'])->middleware(Admin::class);
Route::put('/categoria/{id}', [CategoriaController::class, 'updateCategoria'])->middleware(Admin::class);
Route::delete('/categoria/{id}', [CategoriaController::class, 'deleteCategoria'])->middleware(Admin::class);

Route::get('/usuario', [UsuarioController::class, 'getAll'])->middleware(Admin::class);
Route::get('/usuario/{id}', [UsuarioController::class, 'getById'])->middleware(Admin::class);
Route::post('/usuario', [UsuarioController::class, 'createUser'])->middleware(Admin::class);
Route::put('/usuario/{id}', [UsuarioController::class, 'updateUser'])->middleware(Admin::class);
Route::delete('/usuario', [UsuarioController::class, 'deleteUser'])->middleware(Admin::class);

Route::get('/post', [PostController::class, 'getAll'])->middleware(Admin::class);
Route::get('/post/{id}', [PostController::class, 'getById'])->middleware(Admin::class);
Route::post('/post', [PostController::class, 'createPost'])->middleware(Admin::class);
Route::put('/post/{id}', [PostController::class, 'updatePost'])->middleware(Admin::class);
Route::delete('/post', [PostController::class, 'deletePost'])->middleware(Admin::class);

Route::post('/auth', [Auth::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
