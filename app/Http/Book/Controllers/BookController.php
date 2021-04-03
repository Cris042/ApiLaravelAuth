<?php

namespace SAASBoilerplate\Http\Book\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Book\Requests\Validation;
use SAASBoilerplate\Domain\Book\Requests\ValidationEdit;
use SAASBoilerplate\Domain\Book\Models\Book;

class BookController extends Controller
{
    public function Index()
    {
       $books = Book::all();
       return view('library.book')->with( 'books', $books );
    }

    public function Show( $id )
    {
        $book = Book::find( $id );

        if ( !$book ) 
        {
            return redirect()->route('library.book');
        }

        return view( 'library.editBook', compact('book') );
    }

    public function Store( Validation $request )
    {
        $book = new Book();
        $book->title =  $request->get('title');  
        $book->author = $request->get('author');
        $book->value =  $request->get('value'); 
        $book->description = $request->get('description');
        $book->amount = $request->get('amount'); 
        $book->save();

        return redirect()->route('library.book');
       
    }

    public function Update( ValidationEdit $request, $id)
    {
        if ( !$book = Book::find( $id ) ) 
        {
            return redirect()->back();
        }
       
        if( $request->get('titleCurrent') != $request->get('title') )
        {
            if ( Book::where('title', $request->get('title') )->exists() ) 
                    dd("Livro existente");
            else
            {
                $data = $request->all();
                $book->update( $data );
            }
        }
        else
        {
            $data = $request->all();
            $book->update( $data );
        }
     
        return redirect()->route('library.book');
    }

    public function Destroy( $id )
    {
        if ( !$book = Book::find( $id ) ) 
        {
            return redirect()->back();
        }

        $book->delete();

        return redirect()->route('library.book');
    }

    public function Search( Request $request )
    {
        $filters = $request->except('_token');

        $books = Book::where('title', 'LIKE', "%{$request->search}%")->orWhere('author', 'LIKE', "%{$request->search}%")->paginate();

        return view('library.book', compact('books', 'filters'));
    }
}
