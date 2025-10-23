<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create(['title' => 'Bumi', 'price' => 99000, 'stock' => 50, 'author_id' => 1]);
        Book::create(['title' => 'Harry Potter and the Sorcerer\'s Stone', 'price' => 150000, 'stock' => 30, 'author_id' => 2]);
        Book::create(['title' => 'Laskar Pelangi', 'price' => 85000, 'stock' => 45, 'author_id' => 3]);
        Book::create(['title' => 'Bumi Manusia', 'price' => 125000, 'stock' => 20, 'author_id' => 4]);
        Book::create(['title' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh', 'price' => 95000, 'stock' => 40, 'author_id' => 5]);
    }
}