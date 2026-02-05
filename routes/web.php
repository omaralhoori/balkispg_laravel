<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact', function () {
    // TODO: Handle contact form submission
    return back()->with('success', 'تم إرسال رسالتك بنجاح!');
})->name('contact.submit');
