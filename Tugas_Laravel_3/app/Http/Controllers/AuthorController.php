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
}
