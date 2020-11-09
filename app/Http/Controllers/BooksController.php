<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use Prophecy\Doubler\Generator\Node\ClassNode;
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

    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'author' => 'required'
        ]);

        $book = Book::create(
          $request->only(['title', 'description', 'author'])
        );
    
        return response()->json([
          'created' => true,
          'data' => $book
        ], 201);
      }

      public function update(Request $request, $id)
  {
    try {
      $book = Book::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'message' => 'book not found'
      ], 404);
    }
    $book->fill(
        $request->only(['title', 'description', 'author'])
      );
      $book->save();
  
      return response()->json([
        'updated' => true,
        'data' => $book
      ], 200);
    }

    public function destroy($id)
  {
    try {
      $book = Book::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'error' => [
          'message' => 'book not found'
        ]
      ], 404);
    }

    $book->delete();

    return response()->json([
      'deleted' => true
    ], 200);
  }

}
