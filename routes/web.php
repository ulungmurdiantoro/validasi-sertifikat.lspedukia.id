<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\SertifController;

//route homepage
Route::get('/', [SertifController::class, 'index'])->name('index');
Route::get('/{no_sertif}', [SertifController::class, 'show'])
    ->where('no_sertif', '[0-9\-]+') // Allow numbers and dashes
    ->name('show');
