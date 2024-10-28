<?php

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->group(function (){



// });
Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);
Route::post('/login',[AuthController::class,'login']);
   
Route::get('/products',[ProductController::class,'index']);
    
// Route::post('/orders',[OrderController::class,'store']);
Route::post('/logout',[AuthController::class,'logout']);
    
   
