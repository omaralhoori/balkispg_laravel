<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
