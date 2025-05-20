<?php
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/login',[LoginController::class,'login']);
Route::post('auth/register', [LoginController::class, 'register']);

Route::get('/products', [ProductController::class, 'index']); // Get all products


