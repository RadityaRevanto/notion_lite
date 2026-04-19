<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatkulController;


Route::middleware('guest.session')->group(function () {
    Route::get('/login', function () {
        return view('auth.signin');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


Route::middleware('auth.session')->group(function () {

    Route::get('/master_tutorial', function () {
        return view('pages.master_tutorial');
    })->name('master-tutorial');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/detail-tutorial', function () {
        return view('pages.detail_tutorial');
    })->name('detail-tutorial');

    Route::get('/mata-kuliah', [MatkulController::class, 'getMatkul'])->name('mata-kuliah');
});

Route::redirect('/', '/login');