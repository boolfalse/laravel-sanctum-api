<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Public Routes
Route::resource('/products', ProductController::class);

// Protected Routes
Route::group([
    'middleware' => ['auth:sanctum'],
], function () {
    Route::get('/products/search/{term}', [ProductController::class, 'search']);
});
