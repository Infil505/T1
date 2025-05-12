<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialControlle extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $editoriales = Editorial::all();
        return view('publisher.index', compact('editoriales'));
    }

    public function create()
    {
        return view('publisher.create');
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
        return view('publisher.show', compact('editorial'));
    }

    public function edit($id)
    {
        $editorial = Editorial::findOrFail($id);
        return view('publisher.edit', compact('editorial'));
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
