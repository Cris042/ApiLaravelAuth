<?php

namespace SAASBoilerplate\Http\Loands\Controllers;

use Illuminate\Http\Request;
use SAASBoilerplate\App\Controllers\Controller;
use SAASBoilerplate\Domain\Loands\Models\Loands;

class LoandsController extends Controller
{
    public function index()
    {
        $loands = Loands::all();
        return view('library.loands')->with( 'loands', $loands );
    }
}
