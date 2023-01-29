<?php

use App\Http\Controllers\PontoController;
use App\Http\Controllers\PontoPdfController;
use Illuminate\Support\Facades\Route;

Route::post('/points/registry', [PontoController::class, 'registryPoint']);

Route::get('/points/dowload', [PontoPdfController::class, 'generatePDF']);

Route::get('/points/filter', [PontoController::class, 'filterByDate']);