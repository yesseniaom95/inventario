<?php

use App\Http\Controllers\Api\ProductsController as ApiProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as AuthController;
use App\Http\Controllers\ProductsController;

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

Route::middleware('auth:sanctum')->group(function(){


    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('role:user')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout']);//YA
        Route::get('/products', [ProductsController::class, 'listProducts']);//YA
        Route::get('/product/{id}', [ProductsController::class, 'productDetails']);//YA
        
    });

    Route::middleware('role:admin')->group(function(){
        Route::post('/products', [ProductsController::class, 'createProduct']);//YA
        Route::delete('/products/{id}', [ProductsController::class, 'deleteProduct']);
        Route::put('/products/{id}', [ProductsController::class, 'updateProduct']);//YA
    });

    
});

 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);