<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use Validator;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all();
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
