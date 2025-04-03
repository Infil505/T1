<?php

namespace App\Http\Controllers;

use App\Data\BibliotecaData;

class EditorialControlle extends Controller
{
    public function index()
    {
        $editoriales = BibliotecaData::editoriales();
        $libros = BibliotecaData::libros();
        $autores = BibliotecaData::autores();

        $editorialesConLibros = collect($editoriales)->map(function ($editorial) use ($libros, $autores) {
            $librosEditorial = collect($libros)
                ->where('publisher_id', $editorial['id'])
                ->map(function ($libro) use ($autores) {
                    $autor = collect($autores)->firstWhere('id', $libro['author_id']);
                    return [
                        'title' => $libro['title'],
                        'author' => $autor['author'] ?? 'Desconocido',
                    ];
                })->values();

            $editorial['books'] = $librosEditorial;

            return $editorial;
        });

        return view('publishers', ['editoriales' => $editorialesConLibros]);
    }
}
