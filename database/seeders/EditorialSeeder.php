<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editorial;

class EditorialSeeder extends Seeder
{
    public function run()
    {
        Editorial::create([
            'id' => 1,
            'publisher' => 'John Wiley & Sons',
            'country' => 'United States',
            'founded' => 1807,
            'genere' => 'Academic',
        ]);

        Editorial::create([
            'id' => 2,
            'publisher' => 'Pearson Education',
            'country' => 'United Kingdom',
            'founded' => 1844,
            'genere' => 'Education',
        ]);
    }
}
