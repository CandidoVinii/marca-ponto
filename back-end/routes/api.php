<?php

use App\Http\Controllers\PontoController;
use App\Http\Controllers\PontoPdfController;
use Illuminate\Support\Facades\Route;

Route::post('/registry-point', [PontoController::class, 'registryPoint']);

Route::get('/get-points', [PontoPdfController::class, 'generatePDF']);