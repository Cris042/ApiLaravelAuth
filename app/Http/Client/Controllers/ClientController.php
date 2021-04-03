<?php

namespace SAASBoilerplate\Http\Client\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Client\Requests\Validation;
use SAASBoilerplate\Domain\Client\Requests\ValidationEdit;
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

    public function Store( Validation $request )
    {
        $client = new Client();
        $client->name =  $request->get('name');  
        $client->cpf = $request->get('cpf');
        $client->telephone =  $request->get('telephone'); 
        $client->save();

        return redirect()->route('library.client');
       
    }

    public function Update( ValidationEdit $request, $id)
    {
        if ( !$client = Client::find( $id ) ) 
        {
            return redirect()->back();
        }
       
        if( $request->get('cpfCurrent') != $request->get('cpf') )
        {
            if ( Client::where('cpf', $request->get('cpf') )->exists() ) 
                    dd("Cpf existente");
            else
            {
                $request->merge( ['cpf' => $request->get('cpf') ] );
            }
        }

        if( $request->get('nameCurrent') != $request->get('name') )
        {
            if ( Client::where('name', $request->get('name') )->exists() ) 
                    dd("User existente");
            else
            {
                $request->merge( ['name' => $request->get('name') ] );
            }
        }
        
        $client->name =  $request->get('name');  
        $client->cpf = $request->get('cpf');
        $client->telephone =  $request->get('telephone'); 
        $client->update( );
        
     
        return redirect()->route('library.client');
    }

    public function Destroy( $id )
    {
        if ( !$client = Client::find( $id ) ) 
        {
            return redirect()->back();
        }

        $client->delete();

        return redirect()->route('library.client');
    }

    public function Search( Request $request )
    {
        $filters = $request->except('_token');

        $clients = Client::where('name', 'LIKE', "%{$request->search}%")->paginate();

        return view('library.client', compact('clients', 'filters'));
    }
}
