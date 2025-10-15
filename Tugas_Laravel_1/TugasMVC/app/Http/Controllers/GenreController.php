<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genreModel = new Genre();

        $genres = $genreModel->getAllGenres();

        return view('genres.index', ['genres' => $genres]);
    }
}