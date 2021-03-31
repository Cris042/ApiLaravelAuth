<?php

namespace SAASBoilerplate\Http\Book\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Book\Models\Book;

class BookController extends Controller
{
    public function Index()
    {
       $books = Book::all();
       return view('library.book')->with( 'books', $books );
    }

    public function Show( /*$id*/ )
    {
        // $book = Book::find( $id );

        // if ( !$book ) 
        // {
        //     return redirect()->route('library.book');
        // }

        // return view( 'library.editBook', compact('book') );

        return view('library.editBook');
    }
}
