<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Metal',
            'Pop',
            'Rock',
            'Hip Hop',
            'Rap',
            'Jazz',
            'Grunge',
        ];

        foreach ($genres as $genreName) {
            Genre::create(['naam' => $genreName]);
        }
    }

}
