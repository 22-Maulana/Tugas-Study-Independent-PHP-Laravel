<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function getAllAuthors()
    {
        return [
            ['id' => 1, 'name' => 'Tere Liye'],
            ['id' => 2, 'name' => 'J.K. Rowling'],
            ['id' => 3, 'name' => 'Andrea Hirata'],
            ['id' => 4, 'name' => 'Pramoedya Ananta Toer'],
            ['id' => 5, 'name' => 'Dee Lestari'],
        ];
    }
}