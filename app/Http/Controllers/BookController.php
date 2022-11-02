<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //We shouldn't use all() it can provoke a bottle neck.
        return Book::all();
//        return Book::find(1);

        //it's better to use...
        //return Book::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //To test in postman
        //return "sent POST request";

        //validando...
        $request->validate([
            'title' => ['required'],
        ]);

        //creando...
        $book = new Book;
        $book->title = $request->input('title');
        $book->save();

        //devolviendo respuesta...
        return $book;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $book;
        //without route binding we must use
        //return Book::find($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //To test in postman...
        //return "sent PATCH request";

        //validando...
        $request->validate([
            'title' => ['required'],
        ]);

        //actualizando...
        $book->title = $request->input('title');
        $book->save();

        //devolviendo respuesta...
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //To test in postman
        //return "sent DELETE request";

        $book->delete();

        return response()->noContent();
    }
}
