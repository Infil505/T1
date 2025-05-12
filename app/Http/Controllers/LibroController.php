<?php

namespace App\Http\Controllers;

use App\Models\Libro; 
use App\Models\Autor;
use App\Models\Editorial;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $libros = Libro::with(['autor', 'editorial'])->get();
        return view('book.index', compact('libros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $editoriales = Editorial::all();
        return view('book.create', compact('autores', 'editoriales'));
    }

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
        return redirect()->route('book.index')->with('success', 'Libro agregado correctamente.');
    }

    public function show($id)
    {
        $libro = Libro::with(['autor', 'editorial'])->findOrFail($id);
        return view('book.show', compact('libro'));
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $autores = Autor::all();
        $editoriales = Editorial::all();
        return view('book.edit', compact('libro', 'autores', 'editoriales'));
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return redirect()->route('book.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        return redirect()->route('book.index')->with('success', 'Libro eliminado correctamente.');
    }
}
