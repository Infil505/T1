<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $autores = Autor::all();
        return Inertia::render('authors/index', [
            'autores' => $autores,
            'user' => auth()->user(),
            'flash' => session('success') ? ['success' => session('success')] : [],
        ]);
    }

    /*
    public function create()
    {
        return Inertia::render('authors/create', [
            'errors' => session('errors'),
        ]);
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'nationality' => 'required',
            'birth_year' => 'required|integer',
            'fields' => 'required',
        ]);

        Autor::create($request->all());
        return redirect()->route('authors')->with('success', 'Autor agregado correctamente.');
    }

    public function show($id)
    {
        $autor = Autor::with('libros')->findOrFail($id);
        return Inertia::render('authors/show', [
            'autor' => $autor
        ]);
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return Inertia::render('authors/edit', [
            'autor' => $autor,
            'errors' => session('errors'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return redirect()->route('authors')->with('success', 'Autor actualizado correctamente.');
    }

    public function destroy($id)
    {
        Autor::destroy($id);
        return redirect()->route('authors')->with('success', 'Autor eliminado correctamente.');
    }
}
