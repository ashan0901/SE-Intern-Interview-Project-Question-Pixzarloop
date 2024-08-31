<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function add(Request $request)
    {
        $cat = Category::create($request->all());
        return response()->json($cat, 201);
    }

    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        $cat->update($request->all());
        return response()->json($cat);
    }
}
