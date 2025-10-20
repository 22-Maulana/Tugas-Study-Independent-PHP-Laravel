<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Genre Berhasil Diambil',
            'data'    => $genres
        ]);
    }

    /**
     * Menyimpan genre baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres',
        ]);

        $genre = Genre::create($validatedData);

        // json
        return response()->json([
            'success' => true,
            'message' => 'Genre Berhasil Dibuat',
            'data'    => $genre
        ], 201); // HTTP 201 Created
    }
}