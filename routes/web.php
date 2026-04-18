<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/master-tutorial', function () {
    return view('pages.master_tutorial');
})->name('master-tutorial');

Route::get('/mata-kuliah', function () {
    return view('pages.mata_kuliah');
})->name('mata-kuliah');

Route::get('/detail-tutorial', function () {
    return view('pages.detail_tutorial');
})->name('detail-tutorial');

Route::get('/meeting-notes', function () {
    return view('pages.meeting_notes');
})->name('meeting-notes');

Route::get('/objectives', function () {
    return view('pages.objectives');
})->name('objectives');

Route::get('/trash', function () {
    return view('pages.trash');
})->name('trash');
