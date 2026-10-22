<?php

use App\Http\Controllers\DeteksiController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::get('/deteksi', [DeteksiController::class, 'form'])->name('deteksi');
Route::post('/hasil-deteksi', [DeteksiController::class, 'prosesData'])->name('hasil-deteksi');
Route::get('/riwayat', [DeteksiController::class, 'riwayat'])->name('riwayat');
