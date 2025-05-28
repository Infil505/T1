<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialControlle;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;


// Ruta pública de inicio
Route::get('/', function () {
    return Inertia::render('home', [
        'user' => Auth::user(),
    ]);
})->name('home');


// Rutas de autenticación (solo para invitados)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', function () {
        return Inertia::render('Auth/Register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Cerrar sesión (solo usuarios autenticados)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {

    // Vistas principales (index)
    Route::get('/authors', function () {
        return Inertia::render('authors/index', [
            'autores' => Autor::all(),
            'user' => Auth::user(),
            'flash' => session('success') ? ['success' => session('success')] : [],
        ]);
    })->name('authors');

    Route::get('/book', function () {
        return Inertia::render('book/index', [
            'libros' => Libro::with(['autor', 'editorial'])->get(),
            'user' => Auth::user(),
            'flash' => session('success') ? ['success' => session('success')] : [],
        ]);
    })->name('book');

    Route::get('/publisher', function () {
        return Inertia::render('publisher/index', [
            'editoriales' => Editorial::all(),
            'user' => Auth::user(),
            'flash' => session('success') ? ['success' => session('success')] : [],
        ]);
    })->name('publisher');

    // Rutas protegidas solo para administradores verificados (CRUD)
    Route::middleware('verified')->group(function () {

        // Authors
        Route::get('/authors/create', function () {
            return Inertia::render('authors/create', [
                'errors' => session('errors'),
            ]);
        })->name('book.create');

        Route::post('/authors', [AutorController::class, 'store'])->name('authors.store');

        Route::get('/authors/{id}/edit', function ($id) {
            $autor = Autor::findOrFail($id);
            return Inertia::render('authors/edit', ['autor' => $autor, 'errors' => session('errors')]);
        })->name('authors.edit');

        Route::put('/authors/{id}', [AutorController::class, 'update'])->name('authors.update');
        Route::delete('/authors/{id}', [AutorController::class, 'destroy'])->name('authors.destroy');

        // Books
        Route::get('/book/create', function () {
            return Inertia::render('book/create', [
                'autores' => Autor::all(),
                'editoriales' => Editorial::all(),
                'errors' => session('errors'),
            ]);
        })->name('book.create');

        Route::post('/book', [LibroController::class, 'store'])->name('book.store');

        Route::get('/book/{id}/edit', function ($id) {
            $libro = Libro::findOrFail($id);
            return Inertia::render('book/edit', [
                'libro' => $libro,
                'autores' => Autor::all(),
                'editoriales' => Editorial::all(),
                'errors' => session('errors'),
            ]);
        })->name('book.edit');

        Route::put('/book/{id}', [LibroController::class, 'update'])->name('book.update');
        Route::delete('/book/{id}', [LibroController::class, 'destroy'])->name('book.destroy');

        // Publishers
        Route::get('/publisher/create', function () {
            return Inertia::render('publisher/create', ['errors' => session('errors')]);
        })->name('publisher.create');

        Route::post('/publisher', [EditorialControlle::class, 'store'])->name('publisher.store');

        Route::get('/publisher/{id}/edit', function ($id) {
            $editorial = Editorial::findOrFail($id);
            return Inertia::render('publisher/edit', ['editorial' => $editorial, 'errors' => session('errors')]);
        })->name('publisher.edit');

        Route::put('/publisher/{id}', [EditorialControlle::class, 'update'])->name('publisher.update');
        Route::delete('/publisher/{id}', [EditorialControlle::class, 'destroy'])->name('publisher.destroy');
    });

    // Mostrar detalle de cada recurso (show)
    Route::get('/authors/{id}', function ($id) {
        $autor = Autor::with('libros')->findOrFail($id);
        return Inertia::render('authors/show', ['autor' => $autor]);
    })->name('authors.show');

    Route::get('/book/{id}', function ($id) {
        $libro = Libro::with(['autor', 'editorial'])->findOrFail($id);
        return Inertia::render('book/show', ['libro' => $libro]);
    })->name('book.show');

    Route::get('/publisher/{id}', function ($id) {
        $editorial = Editorial::with('libros')->findOrFail($id);
        return Inertia::render('publisher/show', ['editorial' => $editorial]);
    })->name('publisher.show');


});
