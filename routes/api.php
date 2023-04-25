<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\ProductCategoryController;


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

Route::prefix('auth')->middleware('auth:sanctum')->group(function(){
    Route::apiResource('product-category', ProductCategoryController::class);
    Route::apiResource('discount', DiscountController::class);

});





Route::post('auth/register', [AuthController::class, 'register'])->name('api.user.register');
Route::post('auth/login', [AuthController::class, 'login'])->name('api.user.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('api.user.logout');

