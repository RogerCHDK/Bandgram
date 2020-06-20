<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Compra;
use App\Producto;
use App\Boleto;
use App\CompraBoleto;
use App\Http\Requests; 
use App\Http\Controllers\Controller;

class TarjetasCreditosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario=Auth::user();
        return view('producto.compra',compact("usuario"));
    }

     public function compra($id)
    {  
        $usuario = Auth::user();
        $productos = Producto::findOrFail($id);
        return view('producto.compra',compact("productos","usuario"));
    }

    public function mis_productos()
    {
        $usuario = Auth::user()->id;
        $compras = Compra::where('user_id',$usuario)->get(); 
        return view('producto.mis_productos',compact("compras"));
    }

     public function compra_boleto($id)
    {  
        $usuario = Auth::user();
        $boletos = Boleto::findOrFail($id);
        return view('boleto.compra',compact("boletos","usuario"));
    } 

     public function pago_boleto(Request $request)
    {  
        $usuario = Auth::user()->id; 
         $compra = CompraBoleto::create(
                [
                'boleto_id' => $request->boleto_id, 
                'user_id' => $usuario, 
                'status' => $request->status,
            ]
                ); 
       $producto = Boleto::where('id',$compra->boleto_id)->decrement('stock',1);

        $message = "Compra exitosa, numero de pedido ".$compra->id; 
        return redirect()->route('boletos.index_usuario')->with('message',$message); 
    } 

     public function mis_boletos()
     {
        $usuario = Auth::user()->id;
        $compras = CompraBoleto::where('user_id',$usuario)->get();  
        return view('boleto.mis_boletos',compact("compras")); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = Auth::user()->id;
        $compra = Compra::create(
                [
                'producto_id' => $request->producto_id, 
                'user_id' => $usuario,
                'status' => $request->status,
            ]
                );
       $producto = Producto::where('id',$compra->producto_id)->decrement('stock',1);

        $message = "Compra exitosa, numero de pedido ".$compra->id;
        return redirect()->route('productos.index_usuario')->with('message',$message);
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
}
