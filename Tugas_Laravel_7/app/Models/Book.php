<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'price', 'stock', 'author_id'];

    public function transactions()
    {
    return $this->hasMany(Transaction::class);
    }
}
