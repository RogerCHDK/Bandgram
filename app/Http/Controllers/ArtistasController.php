<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artista;
use Illuminate\Support\Facades\Auth;
use App\Genero;
use App\Cancion;
use App\Video;
use App\Evento;
use App\Producto;
use App\Boleto;
use App\FotoEvento; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Response; 

class ArtistasController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth:artista',['only'=>['index']]);
    }
   
    
    public function index()  
    { 
        $artista=Auth::user();
        $canciones = Cancion::where('artista_id',$artista->id)->where('status',1)->get();
        $videos = Video::where('artista_id',$artista->id)->where('status',1)->get();
        $eventos = Evento::where('artista_id',$artista->id)->where('status',1)->get();
        $productos = Producto::where('artista_id',$artista->id)->where('status',1)->get();
        //$boletos = Boleto::where('artista_id',$artista->id)->where('status',1)->get(); 
      
        return view('artista.index')->with('artista',$artista)->with('canciones',$canciones)
        ->with('videos',$videos)->with('eventos',$eventos)->with('productos',$productos);
        //->with('boletos',$boletos);
    }

    public function index_usuario()  
    { 
        $artistas = Artista::all();
        return view('artista.index_usuario',compact("artistas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genero::all();
         return view('artista.create',compact("genero"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $artista = Artista::findOrFail($id); 
        $canciones = Cancion::where('artista_id',$artista->id)->where('status',1)->get();
        $videos = Video::where('artista_id',$artista->id)->where('status',1)->get();
        $eventos = Evento::where('artista_id',$artista->id)->where('status',1)->get();
        $productos = Producto::where('artista_id',$artista->id)->where('status',1)->get();
        //$boletos = Boleto::where('artista_id',$artista->id)->where('status',1)->get(); 
      
        return view('artista.show')->with('artista',$artista)->with('canciones',$canciones)
        ->with('videos',$videos)->with('eventos',$eventos)->with('productos',$productos); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    } 


    public function getImage($fileName)
    {
        $file = Storage::disk('artista')->get($fileName);
        return new Response($file, 200);
    }
}
