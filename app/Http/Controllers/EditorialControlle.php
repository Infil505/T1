<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorialControlle extends Controller
{
    private $editoriales = [
        [
            'id' => 1,
            'publisher' => 'John Wiley & Sons',
            'country' => 'United States',
            'founded' => 1807,
            'genre' => 'Academic',
            'books' => [
                ['book_id' => 1, 'title' => 'Operating System Concepts'],
                ['book_id' => 2, 'title' => 'Database System Concepts'],
            ],
        ],
        [
            'id' => 2,
            'publisher' => 'Pearson Education',
            'country' => 'United Kingdom',
            'founded' => 1844,
            'genre' => 'Education',
            'books' => [
                ['book_id' => 3, 'title' => 'Computer Networks'],
                ['book_id' => 4, 'title' => 'Modern Operating Systems'],
            ],
        ],
    ];

    public function index()
    {
        return view('publishers', ['editoriales' => $this->editoriales]);
    }
}
