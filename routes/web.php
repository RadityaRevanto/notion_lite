<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/roadmap', function () {
    return view('pages.roadmap');
})->name('roadmap');

Route::get('/meeting-notes', function () {
    return view('pages.meeting_notes');
})->name('meeting-notes');

Route::get('/objectives', function () {
    return view('pages.objectives');
})->name('objectives');

Route::get('/trash', function () {
    return view('pages.trash');
})->name('trash');
