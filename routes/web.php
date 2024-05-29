<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/checkTrackCode', [HomeController::class, 'checkTrackCode'])->name('check');
