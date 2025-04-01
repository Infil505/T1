<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialControlle;

// Ruta principal
Route::get('/', function () {
    return view('app'); // Vista principal, como el layout o página de inicio
})->name('home');

// Ruta de autores (muestra todos los autores)
Route::get('/authors', [AutorController::class, 'index'])->name('authors');

// Ruta de libros (muestra todos los libros)
Route::get('/book', [LibroController::class, 'index'])->name('book');

// Ruta de editoriales (muestra todas las editoriales)
Route::get('/publisher', [EditorialControlle::class, 'index'])->name('publisher');

// Ruta del formulario de contacto
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Ruta para procesar el envío del formulario de contacto
Route::post('/submit-contact-info', function (Request $request) {
    return view('contact-info', ['data' => $request->all()]);
})->name('subir');

// Ruta protegida si estás usando autenticación (opcional)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Otras rutas del sistema (autenticación, configuración)
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
