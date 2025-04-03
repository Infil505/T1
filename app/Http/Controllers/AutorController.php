<?php

namespace App\Http\Controllers;
use App\Data\BibliotecaData;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores = BibliotecaData::autores();
        $libros = BibliotecaData::libros();
        $editoriales = BibliotecaData::editoriales();
    
        // Recorremos autores y les agregamos los libros con editorial
        $autoresConLibros = collect($autores)->map(function ($autor) use ($libros, $editoriales) {
            $autorLibros = collect($libros)
                ->where('author_id', $autor['id'])
                ->map(function ($libro) use ($editoriales) {
                    $editorial = collect($editoriales)->firstWhere('id', $libro['publisher_id']);
                    return [
                        'title' => $libro['title'],
                        'editorial' => $editorial['publisher'] ?? 'Desconocida',
                    ];
                })->values();
    
            $autor['books'] = $autorLibros;
            return $autor;
        });
    
        return view('authors', ['autores' => $autoresConLibros]);
    }
    
}