<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\SertifController;

//route homepage
Route::get('/', [SertifController::class, 'index'])->name('index');
