<?php

namespace App\Http\Controllers;

use App\Models\Libro; 
use App\Models\Autor;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $libros = Libro::with(['autor', 'editorial'])->get();
        return Inertia::render('books/index', [
            'libros' => $libros,
            'user' => auth()->user(),
            'flash' => session('success') ? ['success' => session('success')] : [],
        ]);
    }

    /*public function create()
    {
        $autores = Autor::all();
        $editoriales = Editorial::all();
        return Inertia::render('book/create', [
            'autores' => $autores,
            'editoriales' => $editoriales,
            'errors' => session('errors'),
        ]);
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'edition' => 'required',
            'copyright' => 'required',
            'language' => 'required',
            'pages' => 'required|integer',
            'author_id' => 'required|exists:autors,id',
            'publisher_id' => 'required|exists:editorials,id',
        ]);

        Libro::create($request->all());
        return redirect()->route('book')->with('success', 'Libro agregado correctamente.');
    }

    public function show($id)
    {
        $libro = Libro::with(['autor', 'editorial'])->findOrFail($id);
        return Inertia::render('book/show', [
            'libro' => $libro
        ]);
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $autores = Autor::all();
        $editoriales = Editorial::all();
        return Inertia::render('book/edit', [
            'libro' => $libro,
            'autores' => $autores,
            'editoriales' => $editoriales,
            'errors' => session('errors'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return redirect()->route('book')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        return redirect()->route('book')->with('success', 'Libro eliminado correctamente.');
    }
}
