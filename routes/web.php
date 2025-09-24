<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\SertifController;

//route homepage
Route::get('/', [SertifController::class, 'index'])->name('index');
Route::get('/import', [SertifController::class, 'import'])->name('import');
Route::post('/import', [SertifController::class, 'storeImport'])->name('storeImport');
Route::get('/{no_sertif}', [SertifController::class, 'show'])
    ->where('no_sertif', '[0-9\-]+') // Allow numbers and dashes
    ->name('show');
Route::get('/sk/{no_sk}', [SertifController::class, 'show_sk'])
    ->where('no_sk', '[A-Za-z0-9\/\-]+') // Allow letters, numbers, slashes, and dashes
    ->name('show_sk');
