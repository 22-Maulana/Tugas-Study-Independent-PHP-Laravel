<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    /**
     * Menampilkan daftar semua author.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $authors = Author::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Author Berhasil Diambil',
            'data'    => $authors
        ]);
    }

    /**
     * Menyimpan author baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:authors',
            'bio'  => 'nullable|string',
        ]);

        $author = Author::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Author Berhasil Dibuat',
            'data'    => $author
        ], 201);
    }

    /**
     * Menampilkan author berdasarkan ID.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Author $author): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Author Berhasil Diambil',
            'data'    => $author
        ]);
    }

    /**
     * Memperbarui author di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Author $author): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('authors')->ignore($author->id),
            ],
            'bio'  => 'nullable|string',
        ]);

        $author->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Author Berhasil Diperbarui',
            'data'    => $author
        ]);
    }

    /**
     * Menghapus author dari database.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Author $author): JsonResponse
    {
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author Berhasil Dihapus',
            'data'    => null
        ], 200);
    }
}