<?php

namespace App\Http\Controllers;

use App\Models\Book;
class BooksController extends Controller
{
public function index()
{
  return Book::all();
}

public function Id($id){
    $book = Book::where('id', $id)->first();
        if ($book) {
            return $book;
} else {
            return response()->json([
                'message' => 'Book Not Found',
            ], 404);
        }
    }
}
