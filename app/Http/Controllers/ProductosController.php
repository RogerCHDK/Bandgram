<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producto;
use App\Categoria;
use App\FotoProducto;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Response;

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
        $this->middleware('artista',['except'=>['index_usuario','show','getImage','show_usuario']]); 
        $this->middleware('auth:artista',['except'=>['index_usuario','show','getImage','show_usuario']]);
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
        $validate = $this->validate($request, [
            'nombre' => ['required','String', 'max:255'],
            'precio' => ['required','numeric','min:0'],
            'descripcion' => ['required','String'], 
            'categoria_id' => ['required'],
            'stock' => ['required','numeric','min:0'],
        ]);
        $producto=Producto::create($request->all()); 
        $message = "Producto ". $producto->nombre ." creado correctamente";
        return redirect()->route('productos.index')->with('message',$message);
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
        $fotos = FotoProducto::where('producto_id',$id)->get();
        $bandera = true;
        return view('producto.show')->with('productos',$productos)->with('fotos',$fotos)->with('bandera',$bandera); 
    }

    public function show_usuario($id)
    {
        $productos = Producto::findOrFail($id);
        $fotos = FotoProducto::where('producto_id',$id)->get();
        $bandera = true;
        return view('producto.show_usuario')->with('productos',$productos)->with('fotos',$fotos)->with('bandera',$bandera); 
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
        $message = "Cambios guardados correctamente";
        return redirect()->route('productos.index')->with('message',$message);
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
        $productos = Producto::where('status',1)->get();
        return view('producto.index_usuario',compact("productos"));
    }

     public function imagen($id)
    { 
        $productos = Producto::findOrFail($id);
        return view('producto.agregar_imagenes',compact("productos"));
    }

    public function crear_imagen(Request $request)
    { 
        $imagen = $request->file('foto');  
        $message = "";
        if ($imagen) {
             //ponerle un nombre unico
            $imagen_nombre = time().$imagen->getClientOriginalName();
            $imagen_redimensionada = Image::make($imagen);

            $imagen_redimensionada->resize(200,null,function($c){
                $c->aspectRatio(); 
            })->save(storage_path('app/productos/'.$imagen_nombre));
            
            $foto_producto=FotoProducto::create(
                [
                'nombre' => $request->nombre, 
                'foto' => $imagen_nombre,
                'producto_id' => $request->producto_id,
                'status' => $request->status,
            ]
                );
            $message = "Foto agregada"; 
        } 

        
        return redirect()->route('productos.index')->with('message',$message);
    }

    //Obtener la imagen
    public function getImage($fileName)
    {
        $file = Storage::disk('productos')->get($fileName);
        return new Response($file, 200);   
    }



   

}
