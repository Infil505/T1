<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/book', function () {
    return view('books');
})->name('book');

Route::get('/author', function () {
    return view('authors');
})->name('author');

Route::get('/publisher', function () {
    return view('publishers');
})->name('publisher');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/submit-contact-info', function (Request $request) {
    return view('contact-info', ['data' => $request->all()]);
})->name('subir');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
