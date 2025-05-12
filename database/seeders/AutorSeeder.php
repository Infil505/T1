<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    public function run()
    {
        Autor::create([
            'id' => 1,
            'author' => 'Abraham Silberschatz',
            'nationality' => 'Israelis / American',
            'birth_year' => 1952,
            'fields' => 'Database Systems, Operating Systems',
        ]);

        Autor::create([
            'id' => 2,
            'author' => 'Andrew S. Tanenbaum',
            'nationality' => 'Dutch / American',
            'birth_year' => 1944,
            'fields' => 'Distributed computing, Operating Systems',
        ]);
    }
}
