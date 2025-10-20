<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $books = Book::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Buku Berhasil Diambil',
            'data'    => $books
        ]);
    }
}
