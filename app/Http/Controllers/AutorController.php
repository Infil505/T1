<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

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
    return view('authors.index', compact('autores')); // ✅ Laravel buscará "resources/views/authors/index.blade.php"
}


    public function create()
    {
        return view('authors.create'); // vista: resources/views/authors/create.blade.php
    }

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
        return view('authors.show', compact('autor')); // vista: resources/views/authors/show.blade.php
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('authors.edit', compact('autor')); // vista: resources/views/authors/edit.blade.php
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
