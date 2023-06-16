<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;



// Route::get('/', function () {
//     return redirect()->route('product.index');
// });
Route::redirect('/', '/products');

// Index
Route::get('/products', [ProdukController::class, 'index'])->name('product.index');

// Create
Route::get('/products/create', [ProdukController::class, 'create'])->name('product.create');
Route::post('/products', [ProdukController::class, 'store'])->name('product.store');

// // Show
Route::get('/products/{id}', [ProdukController::class, 'show'])->name('product.show');

// // Edit
Route::get('/products/{id}/edit', [ProdukController::class, 'edit'])->name('product.edit');
Route::put('/products/{id}', [ProdukController::class, 'update'])->name('product.update');    

// // Update Stock
Route::get('/products/{id}/update-stock', [ProdukController::class, 'updateStockForm'])->name('product.updateStockForm');
Route::put('/products/{id}/stock', [ProdukController::class, 'updateStock'])->name('product.updateStock');

// // Delete
Route::delete('/products/{id}', [ProdukController::class, 'destroy'])->name('product.destroy');

// Available & Unavailable
Route::get('/available', [ProdukController::class, 'availableProducts'])->name('product.available');
Route::get('/unavailable', [ProdukController::class, 'unavailableProducts'])->name('product.unavailable');
