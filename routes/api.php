<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelajarController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pelajars', [PelajarController::class, 'index']);
Route::post('/pelajars', [PelajarController::class, 'store']);
Route::get('/pelajars/{id}', [PelajarController::class, 'show']);
Route::put('/pelajars/{id}', [PelajarController::class, 'update']);
