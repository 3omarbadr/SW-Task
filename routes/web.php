<?php

use App\Controllers\ProductController;
use TestTask\Http\Route;

Route::get('/', [ProductController::class, 'index']);

Route::get('/product/create', [ProductController::class, 'create']);

Route::post('/product/store', [ProductController::class, 'store']);

Route::post('/product/mass-delete', [ProductController::class, 'delete']);
