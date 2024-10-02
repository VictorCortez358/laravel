<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [UsersControllers::class, 'index']);

// Rutas protegidas
Route::middleware(['jwt.auth', 'role:rutero'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/perfil', [AuthController::class, 'perfil']);
    Route::get('/rutero', [ProductController::class, 'rutero']);
});




