<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TagApiController;
use App\Http\Controllers\Api\TaskApiController;


// Categories
Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);

// Tags
Route::get('/tags', [TagApiController::class, 'index']);
Route::get('/tags/{id}', [TagApiController::class, 'show']);
Route::post('/tags', [TagApiController::class, 'store']);
Route::put('/tags/{id}', [TagApiController::class, 'update']);
Route::delete('/tags/{id}', [TagApiController::class, 'destroy']);

// Tasks
Route::get('/tasks', [TaskApiController::class, 'index']);
Route::get('/tasks/{id}', [TaskApiController::class, 'show']);
Route::post('/tasks', [TaskApiController::class, 'store']);
Route::put('/tasks/{id}', [TaskApiController::class, 'update']);
Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy']);