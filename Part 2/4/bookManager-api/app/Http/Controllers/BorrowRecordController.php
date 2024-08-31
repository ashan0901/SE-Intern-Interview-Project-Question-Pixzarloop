<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    //
    public function index()
    {
        return 'This is All Borrowing Details Interface';
    }

    public function addBorrow(Request $request)
    {
        $borrow = BorrowRecord::create($request->all());
        return response()->json($borrow, 201);
    }

    public function update(Request $request, $id)
    {
        $borrow = BorrowRecord::find($id);
        $borrow->update($request->all());
        return response()->json($borrow);
    }
}
