<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth','CheckUser']], function () {

     Route::get('/dashboard',[ProductController::class,'dashboard'])->name('dashboard');

    Route::get('trashed',[ProductController::class,'trashed'])->name('trashed.items');
    
    Route::resource('categories',CategoryController::class);
    
    Route::resource('products',ProductController::class);

    
    
    Route::get('products/forcedelete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::get('products/softdelete/{id}', [ProductController::class, 'softdelete'])->name('products.softdelete');
    Route::put('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    
});

// Route::middleware(['auth','CheckUser'])->group(function () {

//     Route::get('/dashboard',[ProductController::class,'dashboard'])->name('dashboard');

//     Route::get('trashed',[ProductController::class,'trashed'])->name('trashed.items');
    
//     Route::resource('categories',CategoryController::class);
    
//     Route::resource('products',ProductController::class);

    
    
//     Route::get('products/forcedelete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
//     Route::get('products/softdelete/{id}', [ProductController::class, 'softdelete'])->name('products.softdelete');
//     Route::put('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    

// });

Route::get('orders/show', [OrderController::class,'show'])->name('orders.show');
Route::get('orders/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::post('orders/searchByProduct/{id}', [OrderController::class, 'searchByProduct'])->name('orders.search');


 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
