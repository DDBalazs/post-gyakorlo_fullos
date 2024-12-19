<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanulokController;
use App\Http\Controllers\KlippekController;
use App\Http\Controllers\SzallitasController;
use App\Http\Controllers\AutokController;
use App\Http\Controllers\SzineszController;

#tanulók
Route::get('/', [TanulokController::class, 'Tanulok']);
Route::post('/', [TanulokController::class, 'TanulokData']);
#klippek
Route::get('/klippek', [KlippekController::class, 'Klipp']);
Route::post('/klippek', [KlippekController::class, 'KlippData']);
#szallitas
Route::get('/szallitas', [SzallitasController::class, 'Szallitas']);
Route::post('/szallitas', [SzallitasController::class, 'SzallitasData']);
#autok
Route::get('/auto', [AutokController::class, 'Autok']);
Route::post('/auto', [AutokController::class, 'AutokData']);
#szinesz
Route::get('/szinesz', [SzineszController::class, 'Szinesz']);
Route::post('/szinesz', [SzineszController::class, 'SzineszData']);
