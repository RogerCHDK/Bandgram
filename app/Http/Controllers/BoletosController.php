<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Boleto;
use App\Evento;

class BoletosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        //$this->middleware('auth');
       $this->middleware('auth:artista',['except'=>['index_usuario','show']]);
    }

    public function index()
    { 
        $artista=Auth::user()->id;
        /*$evento=Evento::where('artista_id',$artista)->get();
        $boletos=Boleto::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();*/
        $boletos=Boleto::where('status',1)->get();
        return view('boleto.index')->with('boletos',$boletos);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $artista=Auth::user()->id;
        $evento=Evento::where('artista_id',$artista)->get();
          return view('boleto.create',compact("evento"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boleto=Boleto::create($request->all());
        return redirect()->route('boletos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $boletos = Boleto::findOrFail($id);
        return view('boleto.show',compact("boletos")); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $boletos = Boleto::findOrFail($id);
        $evento=Evento::where('id',$boletos->evento_id)->get();
          return view('boleto.edit',compact("evento"),compact("boletos"));
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
        $boletos = Boleto::findOrFail($id); 
        $boletos->precio = $request->precio;  
        $boletos->stock = $request->stock; 
        $boletos->evento_id = $request->evento_id; 
        $boletos->save(); 
        return redirect()->route('boletos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boletos = Boleto::findOrFail($id);
        $boletos->status=0;
        $boletos->save();
        return redirect()->route('boletos.index');
    }

    public function index_usuario()
    {
        $boletos = Boleto::all();
        return view('boleto.index_usuario',compact("boletos"));
    }
}
