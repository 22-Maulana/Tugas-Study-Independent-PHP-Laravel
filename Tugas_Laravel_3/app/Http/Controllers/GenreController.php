<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    /**
     * Menampilkan daftar semua genre.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        // Mengambil semua data genre dari database
        $genres = Genre::all();

        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar Genre Berhasil Diambil',
            'data'    => $genres
        ]);
    }
}