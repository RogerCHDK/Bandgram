<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Categoria;


class ProductosController extends Controller
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
        $productos=Producto::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();
        return view('producto.index')->with('productos',$productos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $categoria = Categoria::all();
        $artista=Auth::user()->id;
          return view('producto.create',compact("categoria"),compact("artista"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Producto::findOrFail($id);
        return view('producto.show',compact("productos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::findOrFail($id);
        $categoria = Categoria::all();
        return view('producto.edit')->with('producto',$productos)->with('categoria',$categoria);
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
        $productos = Producto::findOrFail($id);
        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->descripcion = $request->descripcion;
        $productos->categoria_id = $request->categoria_id;
        $productos->stock = $request->stock;
        $productos->save(); 
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $productos->status=0;
        $productos->save();
        return redirect()->route('productos.index');
    }

     public function index_usuario()
    {
        $productos = Producto::all();
        return view('producto.index_usuario',compact("productos"));
    }
}
