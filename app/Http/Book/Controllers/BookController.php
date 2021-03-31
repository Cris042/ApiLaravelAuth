<?php

namespace SAASBoilerplate\Http\Book\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Book\Models\Book;

class BookController extends Controller
{
    public function index()
    {
       $books = Book::all();
       return view('library.book')->with( 'books', $books );
    }
}
