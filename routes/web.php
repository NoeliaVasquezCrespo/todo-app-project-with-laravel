<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

/* Categories */
Route::resource('categories', CategoryController::class);

/* Tags */
Route::resource('tags', TagController::class);

/* Tasks */
Route::resource('tasks', TaskController::class);