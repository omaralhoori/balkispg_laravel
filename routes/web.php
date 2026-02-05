<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/programs', function () {
    $programs = \App\Models\Program::where('is_active', true)->orderBy('order')->get();
    $categories = \App\Models\Program::where('is_active', true)
        ->distinct()
        ->pluck('category')
        ->filter()
        ->values();

    return view('programs.index', [
        'programs' => $programs,
        'categories' => $categories,
    ]);
})->name('programs.index');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
