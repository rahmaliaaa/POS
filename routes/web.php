<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;

// Halaman Home
Route::get('/', [HomeController::class, 'index']);

// Halaman Products dengan prefix kategori
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// Halaman User dengan parameter ID dan Nama
Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

// Halaman Penjualan
Route::get('/sales', [SalesController::class, 'index']);

// Resource Routes untuk CRUD otomatis
Route::resource('products', ProductController::class);
Route::resource('transactions', TransactionController::class);

//untuk laporan penjualan
Route::get('/report', [ReportController::class, 'financialReport'])->name('financial.report');

