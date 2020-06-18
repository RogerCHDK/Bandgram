<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Integrante;
use App\Banda;
use Illuminate\Support\Facades\Auth;

class IntegrantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:artista');
    }

    public function index() 
    {
        $artista=Auth::user()->id;
        $bandas=Banda::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();
       // $integrantes = Integrante::all();
        return view('banda.solicitudes')->with('bandas',$bandas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artista=Auth::user()->id;
        $integrante = Integrante::create(
            [
                'artista_id' => $artista,
                'banda_id' => $request->banda_id,
                'status' => $request->status,
            ] 
        );

        $message = "Peticion emitida correctamente";
        return redirect()->route('bandas.index')->with('message',$message); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $integrante = Integrante::findOrfail($id);
        $integrante->status = 1;
        $integrante->update();
        $message = "Integrante agregado";
        return redirect()->route('integrantes.index')->with('message',$message); 
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
}
