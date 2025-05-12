<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialControlle;

// Ruta pública de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas de autenticación (solo para invitados)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Cerrar sesión (solo usuarios autenticados)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {

    // Rutas de visualización (index y show)
    Route::get('/authors', [AutorController::class, 'index'])->name('authors');
    Route::get('/book', [LibroController::class, 'index'])->name('book');
    Route::get('/publisher', [EditorialControlle::class, 'index'])->name('publisher');

    // Rutas protegidas solo para administradores verificados (CRUD)
    Route::middleware('verified')->group(function () {

        // Authors - las rutas específicas van primero
        Route::get('/authors/create', [AutorController::class, 'create'])->name('authors.create');
        Route::post('/authors', [AutorController::class, 'store'])->name('authors.store');
        Route::get('/authors/{id}/edit', [AutorController::class, 'edit'])->name('authors.edit');
        Route::put('/authors/{id}', [AutorController::class, 'update'])->name('authors.update');
        Route::delete('/authors/{id}', [AutorController::class, 'destroy'])->name('authors.destroy');

        // Books
        Route::get('/book/create', [LibroController::class, 'create'])->name('book.create');
        Route::post('/book', [LibroController::class, 'store'])->name('book.store');
        Route::get('/book/{id}/edit', [LibroController::class, 'edit'])->name('book.edit');
        Route::put('/book/{id}', [LibroController::class, 'update'])->name('book.update');
        Route::delete('/book/{id}', [LibroController::class, 'destroy'])->name('book.destroy');

        // Publishers
        Route::get('/publisher/create', [EditorialControlle::class, 'create'])->name('publisher.create');
        Route::post('/publisher', [EditorialControlle::class, 'store'])->name('publisher.store');
        Route::get('/publisher/{id}/edit', [EditorialControlle::class, 'edit'])->name('publisher.edit');
        Route::put('/publisher/{id}', [EditorialControlle::class, 'update'])->name('publisher.update');
        Route::delete('/publisher/{id}', [EditorialControlle::class, 'destroy'])->name('publisher.destroy');
    });

    // Las rutas con {id} deben ir al final para evitar conflictos
    Route::get('/authors/{id}', [AutorController::class, 'show'])->name('authors.show');
    Route::get('/book/{id}', [LibroController::class, 'show'])->name('book.show');
    Route::get('/publisher/{id}', [EditorialControlle::class, 'show'])->name('publisher.show');
});
