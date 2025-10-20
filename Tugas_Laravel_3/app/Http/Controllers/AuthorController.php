<?php

namespace App\Http\Controllers;

use App\Models\Author; // Pastikan model Author sudah ada
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    /**
     * Menampilkan daftar semua author.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        // Mengambil semua data author dari database
        $authors = Author::all();

        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar Author Berhasil Diambil',
            'data'    => $authors
        ]);
    }
}
