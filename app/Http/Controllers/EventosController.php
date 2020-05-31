<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Estado; 
use App\Municipio;



class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    {
        $this->middleware('artista',['except'=>['index_usuario','show']]); 
        $this->middleware('auth:artista',['except'=>['index_usuario','show']]);
    }

    public function index()
    {
        $artista=Auth::user()->id;
        $eventos=Evento::where('artista_id',$artista)->where('status',1)->orderBy('id')->get();
        return view('evento.index')->with('eventos',$eventos);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  
    {
        $estado = Estado::all();
        $municipio = Municipio::all();
        $artista=Auth::user()->id;
        return view('evento.create')->with('estado',$estado)->with('municipio',$municipio)->with('artista',$artista);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento=Evento::create($request->all());
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos = Evento::findOrFail($id); 
        return view('evento.show',compact("eventos"));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::all();
        $municipio = Municipio::all();
        $eventos = Evento::findOrFail($id);
        return view('evento.edit')->with('evento',$eventos)->with('estado',$estado)->with('municipio',$municipio);
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
        $eventos = Evento::findOrFail($id);
        $eventos->descripcion =$request->descripcion;
        $eventos->fecha_inicio =$request->fecha_inicio;
        $eventos->hora_inicio =$request->hora_inicio;
        $eventos->calle =$request->calle;
        $eventos->colonia =$request->colonia;
        $eventos->estado_id =$request->estado_id;
        $eventos->municipio_id =$request->municipio_id;
        $eventos->nombre_locacion =$request->nombre_locacion;
        $eventos->save();
        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventos = Evento::findOrFail($id);
        $eventos->status=0;
        $eventos->save();
        return redirect()->route('eventos.index');
    }

    public function index_usuario()
    {
        $eventos = Evento::all();
        return view('evento.index_usuario',compact("eventos"));
    }
}
