<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/partner', [HomeController::class, 'partner'])->name('partner');
Route::post('/set/partner', [HomeController::class, 'setPartner'])->name('set.partner');
Route::get('/checkTrackCode', [HomeController::class, 'checkTrackCode'])->name('check');
