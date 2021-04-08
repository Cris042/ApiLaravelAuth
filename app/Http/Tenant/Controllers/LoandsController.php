<?php

namespace SAASBoilerplate\Http\Tenant\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Loands\Requests\Validation;
use SAASBoilerplate\Domain\Loands\Models\Loands;
use SAASBoilerplate\Domain\Book\Models\Book;
use SAASBoilerplate\Domain\Client\Models\Client;

class LoandsController extends Controller
{
    public function Index()
    {
        $loands = Loands::all()->where( 'state', 1, 'and','company_id', session('tenant') );
        $books =  Book::all()->where('amount', '>', 1 );
        $clients =  Client::all()->Where( 'company_id', session('tenant') );

        return view('library.loands')->with( 'loands', $loands )->with( 'books', $books )->with( 'clients', $clients );
    }

    public function Store( Validation $request )
    {
        $valueLivro =  Book::where( 'id', $request->get('book_id') )->value('value');
        $amountBook =  Book::where( 'id', $request->get('book_id') )->value('amount');

        if( $amountBook >= $request->get('amount') )
        {
            $loands = new Loands();
            $loands->client_id =  $request->get('client_id');  
            $loands->book_id = $request->get('book_id');
            $loands->value =  $request->get('amount') * $valueLivro ; 
            $loands->amount =  $request->get('amount'); 
            $loands->state = 1;
            $loands->expires_at =  $request->get('expires_at'); 
            $loands->company_id =  $request->get('company_id'); 
            $loands->save();

            Book::where( 'id', $request->get('book_id') )->update( array( 'amount' => $amountBook - $request->get('amount') ) );

            return redirect()->route('tenant.library.loands');   
        }
        else
           dd('Quantidade acima do estoque!');

     
    }

    public function Update( $id )
    {
        if ( !$loands = Loands::find( $id ) ) 
        {
            return redirect()->back();
        }
        
        $amountBook = Loands::where( 'id', $loands->id )->value('amount');
        $amountBookCurrent = Book::where( 'id', $loands->book_id )->value('amount');

        Loands::where( 'id', $loands->id )->update( array( 'state'  => 0) );
        Book::where( 'id', $loands->book_id )->update( array( 'amount' => $amountBookCurrent + $amountBook ) );

        return redirect()->route('tenant.library.loands');  
    }

    public function Search( Request $request )
    {
        $book = Book::where( 'title',  $request->search  )->value('id');
        $loands = Loands::where( 'book_id', $book )->paginate();

        $books =  Book::all()->where('amount', '>', 1 );
        $clients =  Client::all();

        return view('tenant.library.loands ')->with( 'loands', $loands )->with( 'books', $books )->with( 'clients', $clients );
    }

   
}
