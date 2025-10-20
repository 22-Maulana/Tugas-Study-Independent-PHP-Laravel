<?php

namespace App\Http\Controllers;

use App\Models\Author; 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:authors',
        ]);

        $author = Author::create($validatedData);

        // sjon
        return response()->json([
            'success' => true,
            'message' => 'Author Berhasil Dibuat',
            'data'    => $author
        ], 201); // HTTP 201 Created
    }
}
