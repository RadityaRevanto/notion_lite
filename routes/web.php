<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\TutorialDetailController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ApiController;


Route::middleware('guest.session')->group(function () {
    Route::get('/login', function () {
        return view('auth.signin');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth.session')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/mata-kuliah', [MatkulController::class, 'getMatkul'])->name('mata-kuliah');
    Route::get('/master_tutorial', [TutorialController::class, 'index'])
        ->name('master-tutorial');
    Route::post('/tutorial', [TutorialController::class, 'store'])
        ->name('tutorial.store');
    Route::delete('/tutorial/{id}', [TutorialController::class, 'destroy'])
        ->name('tutorial.destroy');
    Route::get('/detail_tutorial/{id}', [TutorialDetailController::class, 'index'])
        ->name('detail_tutorial');
    Route::post('/detail-tutorial/{id}', [TutorialDetailController::class, 'store'])
        ->name('detail.store');
    Route::post('/detail-toggle/{id}', [TutorialDetailController::class, 'toggle'])
        ->name('detail.toggle');
    Route::delete('/detail/{id}', [TutorialDetailController::class, 'destroy'])
        ->name('detail.delete');
    Route::put('/detail/{id}', [TutorialDetailController::class, 'update'])
        ->name('detail.update');
});

Route::get('/presentation/{token}', [PresentationController::class, 'presentation'])->name('presentation');
Route::get('/finished/{token}', [PresentationController::class, 'finished'])->name('finished');
Route::redirect('/', '/login');

Route::prefix('api')->group(function () {
    Route::get('/tutorials', [ApiController::class, 'getTutorials']);
    Route::get('/tutorials/{id}', [ApiController::class, 'getTutorialById']);
});
