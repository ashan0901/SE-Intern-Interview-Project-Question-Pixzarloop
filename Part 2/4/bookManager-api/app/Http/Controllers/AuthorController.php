<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function Add(Request $request)
    {
        $author = Author::create($request->all());
        return response()->json($author, 201);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->update($request->all());
        return response()->json($author);
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();
        return response()->json(null, 204);
    }
}
