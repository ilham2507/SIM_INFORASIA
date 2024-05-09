<?php

use App\Http\Controllers\PenerimaProyekController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskProyekController;
use App\Http\Controllers\UserController;
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

//user API
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// proyek api
Route::get('/proyeks', [ProyekController::class, 'index']);
Route::get('/proyeks/{id}', [ProyekController::class, 'show']);
Route::post('/proyeks', [ProyekController::class, 'store']);
Route::put('/proyeks/{id}', [ProyekController::class, 'update']);
Route::delete('/proyeks/{id}', [ProyekController::class, 'destroy']);

// task Proyek API
Route::get('/tasks', [TaskProyekController::class, 'index']);
Route::get('/tasks/{id}', [TaskProyekController::class, 'show']);
Route::post('/tasks', [TaskProyekController::class, 'store']);
Route::put('/tasks/{id}', [TaskProyekController::class, 'update']);
Route::delete('/tasks/{id}', [TaskProyekController::class, 'destroy']);

//penerima Proyek API
Route::get('/penerima-proyeks', [PenerimaProyekController::class, 'index']);
Route::get('/penerima-proyeks/{id}', [PenerimaProyekController::class, 'show']);
Route::post('/penerima-proyeks', [PenerimaProyekController::class, 'store']);
Route::put('/penerima-proyeks/{id}', [PenerimaProyekController::class, 'update']);
Route::delete('/penerima-proyeks/{id}', [PenerimaProyekController::class, 'destroy']);

//role API
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::post('/roles', [RoleController::class, 'store']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
