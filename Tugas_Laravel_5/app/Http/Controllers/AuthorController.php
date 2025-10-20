<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class AuthorController extends Controller
{
    /**
     * Menampilkan semua data author (READ - Index)
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    /**
     * Menyimpan data author baru (CREATE - Store)
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima [cite: 121]
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Wajib diisi, string, maks 255 karakter [cite: 133]
            'bio' => 'nullable|string', // Boleh kosong, string
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); // 400 Bad Request [cite: 395]
        }

        // Buat data baru
        $author = Author::create($request->all());

        // Kembalikan respons JSON dengan data yang baru dibuat dan status 201 Created [cite: 393]
        return response()->json($author, 201);
    }

    /**
     * Menampilkan satu data author berdasarkan ID (READ - Show)
     */
    public function show($id)
    {
        // Cari author berdasarkan ID
        $author = Author::find($id);

        // Jika data tidak ditemukan, kembalikan error 404 [cite: 395]
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        // Kembalikan data sebagai JSON
        return response()->json($author);
    }

    /**
     * Memperbarui data author berdasarkan ID (UPDATE - Update)
     */
    public function update(Request $request, $id)
    {
        // Cari author berdasarkan ID
        $author = Author::find($id);

        // Jika data tidak ditemukan, kembalikan error 404 [cite: 395]
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update data author
        $author->update($request->all());

        // Kembalikan data yang sudah di-update sebagai JSON
        return response()->json($author);
    }

    /**
     * Menghapus data author berdasarkan ID (DELETE - Destroy)
     */
    public function destroy($id)
    {
        // Cari author berdasarkan ID
        $author = Author::find($id);

        // Jika data tidak ditemukan, kembalikan error 404 [cite: 395]
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        // Hapus data
        $author->delete();

        // Kembalikan respons sukses (200 OK) dengan pesan
        return response()->json(['message' => 'Author deleted successfully']);
    }
}