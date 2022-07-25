<?php

use App\Controllers\HomeController;
use TestTask\Http\Route;

Route::get('/',[HomeController::class, 'index']);