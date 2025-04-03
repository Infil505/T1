<?php

namespace App\Http\Controllers;
use App\Data\BibliotecaData;

use Illuminate\Http\Request;

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
                'id' => $libro['id'] ?? null,
                'title' => $libro['title'] ?? 'Sin título',
                'edition' => $libro['edition'] ?? 'N/A',
                'copyright' => $libro['copyright'] ?? 'N/A',
                'language' => $libro['language'] ?? 'N/A',
                'pages' => $libro['pages'] ?? 'N/A',
                'author' => $autor['author'] ?? 'Desconocido',
                'publisher' => $editorial['publisher'] ?? 'Desconocida',
            ];
        });

        return view('books', ['libros' => $librosConDatos]);
    }
}
