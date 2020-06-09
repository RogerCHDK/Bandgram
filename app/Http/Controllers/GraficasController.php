<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Genero;

class GraficasController extends Controller
{

	public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(){
    	$genero = Genero::all();
    	return view('graficas.index')->with('generos',$genero);
    }
}
