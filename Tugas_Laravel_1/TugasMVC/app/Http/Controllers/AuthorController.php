<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authorModel = new Author();
        $authors = $authorModel->getAllAuthors();
        return view('authors.index', ['authors' => $authors]);
    }
}