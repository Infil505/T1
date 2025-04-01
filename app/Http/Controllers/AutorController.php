<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    private $autores = [
        [
            'id' => 1,
            'author' => 'Abraham Silberschatz',
            'nationality' => 'Israelis / American',
            'birth_year' => 1952,
            'fields' => 'Database Systems, Operating Systems',
            'books' => [
                ['title' => 'Operating System Concepts'],
                ['title' => 'Database System Concepts'],
            ],
        ],
        [
            'id' => 2,
            'author' => 'Andrew S. Tanenbaum',
            'nationality' => 'Dutch / American',
            'birth_year' => 1944,
            'fields' => 'Distributed computing, Operating Systems',
            'books' => [
                ['title' => 'Computer Networks'],
                ['title' => 'Modern Operating Systems'],
            ],
        ],
    ];

    public function index()
    {
        // 👇 Esta línea pasa la variable $autores a la vista
        return view('authors', ['autores' => $this->autores]);
    }
}