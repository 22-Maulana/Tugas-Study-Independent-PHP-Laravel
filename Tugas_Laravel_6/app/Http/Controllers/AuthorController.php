<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string', 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); 
        }

        // Buat data baru
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function show($id)
    {

        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json($author);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'bio' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $author->update($request->all());

        return response()->json($author);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        // Hapus data
        $author->delete();

        return response()->json(['message' => 'Author deleted successfully']);
    }
}