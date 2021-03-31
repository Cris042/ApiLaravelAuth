<?php

namespace SAASBoilerplate\Http\Client\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Client\Models\Client;

class ClientController extends Controller
{
    public function Index()
    {
        $clients = Client::all();
        return view('library.client')->with( 'clients', $clients );
    }

    public function Show( $id )
    {
        $client = Client::find( $id );
    
        if ( !$client ) 
        {
            return redirect()->route('library.client');
        }
    
        return view( 'library.editClient', compact('client') );
    }
}
