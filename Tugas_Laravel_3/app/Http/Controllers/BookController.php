<?php

namespace App\Http\Controllers;

use App\Models\Book; // Pastikan model Book sudah ada
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        // Mengambil semua data buku dari database
        $books = Book::all();

        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Daftar Buku Berhasil Diambil',
            'data'    => $books
        ]);
    }
}
