<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HomeController;

Route::resource('tipe', TipeController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');