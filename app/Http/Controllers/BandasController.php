<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Genero;
use App\Banda;

class BandasController extends Controller
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
        $bandas=Banda::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();
        return view('banda.index')->with('bandas',$bandas); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genero::all();
        $artista=Auth::user()->id;
        return view('banda.create',compact("genero"),compact("artista"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $banda=Banda::create($request->all());
        return redirect()->route('artista.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bandas = Banda::findOrFail($id);
        return view('banda.show',compact("bandas"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bandas = Banda::findOrFail($id);
        $generos = Genero::all();
        return view('banda.edit')->with('bandas',$bandas)->with('genero',$generos);
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
        $bandas = Banda::findOrFail($id);
        $bandas->nombre=$request->nombre;
        $bandas->biografia=$request->biografia;
        $bandas->foto=$request->foto;
        $bandas->genero_id=$request->genero_id;
         $bandas->save(); 
        return redirect()->route('bandas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bandas = Banda::findOrFail($id);
        $bandas->status=0;
        $bandas->save();
        return redirect()->route('bandas.index');
    }

     public function index_usuario()
    {
        $bandas = Banda::all();
        return view('banda.index_usuario',compact("bandas"));
    }
}
