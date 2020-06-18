<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Genero;
use App\Banda;
use App\Integrante;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Response; 

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
        $this->middleware('artista',['except'=>['index_usuario','show']]); 
        $this->middleware('auth:artista',['except'=>['index_usuario','show']]);
    }

    public function index() 
    {
        $artista=Auth::user()->id;
        $bandas = Banda::where('status',1)->get();
        return view('banda.index')->with('bandas',$bandas)->with('artista',$artista); 
    }

     public function mis_bandas()  
    {
        $artista=Auth::user()->id;
        //$bandas=Banda::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();
        $integrantes = Integrante::where('artista_id',$artista)->get();
        return view('banda.mis_bandas')->with('integrantes',$integrantes);  
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
        $imagen = $request->file('foto');  
        if ($imagen) {
            //ponerle un nombre unico
            $imagen_nombre = time().$imagen->getClientOriginalName();
            $imagen_redimensionada = Image::make($imagen);

            //Guardar la imagen
            //Storage::disk('cancion')->put($imagen_nombre, File::get($imagen));
            $imagen_redimensionada->resize(200,null,function($c){
                $c->aspectRatio();
            })->save(storage_path('app/bandas/'.$imagen_nombre));

            $request->foto = $imagen_nombre;

        }

        $banda=Banda::create(
           [ 'nombre' => $request->nombre,
            'biografia'=>$request->biografia,
            'foto'=>$request->foto,
            'genero_id' => $request->genero_id,
            'artista_id' => $request->artista_id,
            'status' => $request->status,
        ]
        );

        $integrante = Integrante::create(
            [
                'artista_id' => $request->artista_id,
                'banda_id' => $banda->id,
                'status' => 1,
            ] 
        );
        $message = "Banda creada correctamente";
        return redirect()->route('bandas.mine')->with('message',$message); 
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
        $integrantes = Integrante::where('banda_id',$id)->get();
        return view('banda.show',compact("bandas","integrantes"));
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
        return redirect()->route('bandas.mine');
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
        return redirect()->route('bandas.mine');
    }

     public function index_usuario()
    {
        $bandas = Banda::all();
        return view('banda.index_usuario',compact("bandas"));
    }

    //Obtener imagen de la banda
    public function getImage($fileName)
    {
        $file = Storage::disk('bandas')->get($fileName);
        return new Response($file, 200);
    }

    public function unirse()
    {
        $file = Storage::disk('bandas')->get($fileName); 
        return new Response($file, 200);
    }
}
