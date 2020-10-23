<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Genero;
use App\CompraBoleto;
use App\Boleto;
use App\Producto;
use App\Evento;
use Illuminate\Support\Facades\Auth;


class GraficasController extends Controller
{

	public function __construct() 
    {
        $this->middleware('auth:artista',['except'=>['index']]) ; 
    }

    public function index(){
    	$genero = Genero::all();
    	return view('graficas.index')->with('generos',$genero);
    } 

    public function grafica_boletos(){
    	$artista = Auth::user()->id;
    	$boletos = Boleto::where('status',1)->get();
    	return view('graficas.boletos')->with('boletos',$boletos)->with('artista',$artista);
    } 

    public function grafica_productos(){
    	$artista = Auth::user()->id; 
    	$productos = Producto::where('status',1)->where('artista_id',$artista)->get();
    	return view('graficas.productos')->with('productos',$productos);
    } 

    public function grafica_eventos(){
    	$artista = Auth::user()->id; 
    	$eventos = Evento::where('status',1)->where('artista_id',$artista)->get();
    	return view('graficas.eventos')->with('eventos',$eventos);
    } 
}
