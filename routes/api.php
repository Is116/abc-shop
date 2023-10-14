<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->group(function () {
    Route::get('/',  [CategoryController::class, 'index'])->name('api.categories.index');
    Route::post('/', [CategoryController::class, 'store'])->name('api.categories.store');
    Route::get('/{category}',  [CategoryController::class, 'show'])->name('api.categories.show');
    Route::put('/{category}',  [CategoryController::class, 'update'])->name('api.categories.update');
    Route::delete('/{category}',  [CategoryController::class, 'destroy'])->name('api.categories.destroy');
});

Route::prefix('products')->group(function () {
    Route::get('/',  [ProductController::class, 'index'])->name('api.products.index');
    Route::post('/', [ProductController::class, 'store'])->name('api.products.store');
    Route::get('/{product}', [ProductController::class, 'show'])->name('api.products.show');
    Route::put('/{product}', [ProductController::class, 'update'])->name('api.products.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('api.products.destroy');
});