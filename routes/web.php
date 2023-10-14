<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('categories')->group(function () {
        Route::get('/', [PagesController::class, 'categories'])->name('categories.index');
        Route::get('/{category_id}', [PagesController::class, 'updateCategory'])->name('category.update');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [PagesController::class, 'products'])->name('products.index');
        Route::get('/{product_id}', [PagesController::class, 'updateProduct'])->name('product.update');
    });

});
