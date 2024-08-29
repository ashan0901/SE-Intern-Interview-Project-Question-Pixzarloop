<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use Validator;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        $data = [
            'status'=>200,
            'book'=>$book
        ];
        return response()->json($data,200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year_published' => 'nullable|integer',
        ]);

        if($validator->fails()){
            $data = [
                "status"=>422,
                "message"=> $validator->messages()
            ];
            return response()->json($data,422);
        }
        else{
            $book = new Book;
            $book->title=$request->title;
            $book->author=$request->author;
            $book->description=$request->description;
            $book->year_published=$request->year_published;

            $book->save();

            $data=[
                'status'=>200,
                'message'=> 'Data Stored success'
            ];
            return response()->json($data,200);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year_published' => 'nullable|integer',
        ]);

        if($validator->fails()){
            $data = [
                "status"=>422,
                "message"=> $validator->messages()
            ];
            return response()->json($data,422);
        }
        else{
            $book = Book::find($id);
            $book->title=$request->title;
            $book->author=$request->author;
            $book->description=$request->description;
            $book->year_published=$request->year_published;

            $book->save();

            $data=[
                'status'=>200,
                'message'=> 'Data Updated success'
            ];
            return response()->json($data,200);
        }
    }

    public function delete($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        $data=[
            'status'=>200,
            'message'=> 'Data Deleted success'
        ];

        return response()->json($data,200);
    }
}
