<?php

use App\Http\Controllers\GundamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/gundam', [GundamController::class,'index']);
Route::get('/gundam/{gundam}', [GundamController::class,'show']);
Route::post('/gundam', [GundamController::class,'store']);
Route::patch('/gundam/{gundam}', [GundamController::class,'update']);
Route::delete('/gundam/{gundam}', [GundamController::class,'destroy']);
