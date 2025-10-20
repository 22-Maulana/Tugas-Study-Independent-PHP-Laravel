<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Validation\Rule;
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

    /**
     * Menampilkan genre berdasarkan ID.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Genre $genre): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Genre Berhasil Diambil',
            'data'    => $genre
        ]);
    }

    /**
     * Memperbarui genre di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Genre $genre): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('genres')->ignore($genre->id),
            ],
        ]);

        $genre->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Genre Berhasil Diperbarui',
            'data'    => $genre
        ]);
    }

    /**
     * Menghapus genre dari database.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Genre $genre): JsonResponse
    {
        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Genre Berhasil Dihapus',
            'data'    => null
        ], 200);
    }
}