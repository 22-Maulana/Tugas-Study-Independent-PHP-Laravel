<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create(['name' => 'Tere Liye', 'bio' => 'Penulis produktif dengan puluhan karya best-seller.']);
        Author::create(['name' => 'J.K. Rowling', 'bio' => 'Pencipta dunia sihir Harry Potter yang fenomenal.']);
        Author::create(['name' => 'Andrea Hirata', 'bio' => 'Dikenal melalui novel Laskar Pelangi yang inspiratif.']);
        Author::create(['name' => 'Pramoedya Ananta Toer', 'bio' => 'Sastrawan besar Indonesia dengan karya-karya monumental.']);
        Author::create(['name' => 'Dee Lestari', 'bio' => 'Penulis multitalenta yang juga seorang penyanyi.']);
    }
}