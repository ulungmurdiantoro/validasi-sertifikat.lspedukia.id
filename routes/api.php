<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SertifikatController;

Route::get('/sertifikat', [SertifikatController::class, 'index']);