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

Route::get('/blog', function () {
    $featuredPost = \App\Models\BlogPost::where('is_active', true)
        ->where('is_featured', true)
        ->where('published_at', '<=', now())
        ->orderBy('published_at', 'desc')
        ->first();

    $posts = \App\Models\BlogPost::where('is_active', true)
        ->where('published_at', '<=', now())
        ->where(function ($query) use ($featuredPost) {
            if ($featuredPost) {
                $query->where('id', '!=', $featuredPost->id);
            }
        })
        ->orderBy('published_at', 'desc')
        ->paginate(6);

    $categories = \App\Models\BlogPost::where('is_active', true)
        ->where('published_at', '<=', now())
        ->selectRaw('category, COUNT(*) as count')
        ->groupBy('category')
        ->orderBy('count', 'desc')
        ->get();

    return view('blog.index', [
        'featuredPost' => $featuredPost,
        'posts' => $posts,
        'categories' => $categories,
    ]);
})->name('blog.index');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
