<?php

namespace SAASBoilerplate\Http\Client\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Client\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('library.client')->with( 'clients', $clients );
    }
}
