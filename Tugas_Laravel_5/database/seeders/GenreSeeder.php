<?php

namespace Database\Seeders;

use App\Models\Genre; // Import model
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create(['name' => 'Fiksi Ilmiah', 'description' => 'Cerita berbasis sains dan teknologi.']);
        Genre::create(['name' => 'Fantasi', 'description' => 'Cerita di dunia magis atau mitos.']);
        Genre::create(['name' => 'Misteri', 'description' => 'Cerita yang fokus pada pemecahan teka-teki.']);
        Genre::create(['name' => 'Roman', 'description' => 'Cerita yang fokus pada hubungan romantis.']);
        Genre::create(['name' => 'Horor', 'description' => 'Cerita yang bertujuan untuk menakuti pembaca.']);
    }
}