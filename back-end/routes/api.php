<?php

use App\Http\Controllers\PontoController;
use Illuminate\Support\Facades\Route;

Route::post('/registry-point', [PontoController::class, 'registryPoint']);