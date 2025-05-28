<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EditorialControlle extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $editoriales = Editorial::all();
        return Inertia::render('publishers/index', [
            'editoriales' => $editoriales,
            'user' => auth()->user(),
            'flash' => session('success') ? ['success' => session('success')] : [],
        ]);
    }

    public function create()
    {
        return Inertia::render('publishers/create', [
            'errors' => session('errors'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'publisher' => 'required',
            'country' => 'required',
            'founded' => 'required|integer',
            'genere' => 'required',
        ]);

        Editorial::create($request->all());
        return redirect()->route('publisher')->with('success', 'Editorial agregada correctamente.');
    }

    public function show($id)
    {
        $editorial = Editorial::with('libros')->findOrFail($id);
        return Inertia::render('publishers/show', [
            'editorial' => $editorial
        ]);
    }

    public function edit($id)
    {
        $editorial = Editorial::findOrFail($id);
        return Inertia::render('publishers/edit', [
            'editorial' => $editorial,
            'errors' => session('errors'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->update($request->all());
        return redirect()->route('publisher')->with('success', 'Editorial actualizada correctamente.');
    }

    public function destroy($id)
    {
        Editorial::destroy($id);
        return redirect()->route('publisher')->with('success', 'Editorial eliminada correctamente.');
    }
}
