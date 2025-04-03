<?php

namespace App\Http\Controllers;

use App\Data\BibliotecaData;

class LibroController extends Controller
{
    public function index()
    {
        $libros = BibliotecaData::libros();
        $autores = BibliotecaData::autores();
        $editoriales = BibliotecaData::editoriales();

        $librosConDatos = collect($libros)->map(function ($libro) use ($autores, $editoriales) {
            $autor = collect($autores)->firstWhere('id', $libro['author_id']);
            $editorial = collect($editoriales)->firstWhere('id', $libro['publisher_id']);

            return [
                'id' => $libro['id'],
                'title' => $libro['title'],
                'edition' => $libro['edition'],
                'copyright' => $libro['copyright'],
                'language' => $libro['language'],
                'pages' => $libro['pages'],
                'author' => $autor['author'] ?? 'Desconocido',
                'publisher' => $editorial['publisher'] ?? 'Desconocida',
            ];
        });

        return view('books', ['libros' => $librosConDatos]);
    }
}
