<?php

namespace App\Http\Controllers\Api;

use App\Filters\BookFilter;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookShowResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new BookFilter;
        $query = $filter->transform($request);
        // dd($query);
        // dd(request()->query('title')['eq']);
        $books = Book::where($query)->with('author')->latest('id')->paginate(5);

        return new BookCollection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book, Request $request)
    {
        $book = $book->load('author');
        // return $book;
        return new BookShowResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
