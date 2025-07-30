<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/show/{id}', [TaskController::class, 'show']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'show']);
Route::put('/tasks/update/{id}', [TaskController::class, 'update']);
Route::post('/tasks', [TaskController::class, 'save']);
Route::post('/tasks/delete/{id}', [TaskController::class, 'delete']);

