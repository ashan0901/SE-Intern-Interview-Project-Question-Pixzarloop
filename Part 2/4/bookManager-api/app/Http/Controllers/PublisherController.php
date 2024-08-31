<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    //
    public function add(Request $request)
    {
        $publisher = Publisher::create($request->all());
        return response()->json($publisher, 201);
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::find($id);
        $publisher->update($request->all());
        return response()->json($publisher);
    }
}
