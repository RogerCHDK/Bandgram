<?php

namespace App\Http\Controllers; 
 
use Illuminate\Http\Request;  
use Illuminate\Http\Response;  
use App\Genero;
use Illuminate\Support\Facades\Auth;
use App\Cancion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image\ImageManagerStatic as Image;

class CancionesController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct() 
    {
        $this->middleware('artista',['except'=>['index_usuario','show','getImage','getMusic']]); 
        $this->middleware('auth:artista',['except'=>['index_usuario','show','getImage','getMusic']]);
    }
    public function index()
    {
        $artista=Auth::user()->id;
        $canciones=Cancion::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();
        return view('cancion.index')->with('canciones',$canciones); 
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
        return view('cancion.create',compact("genero"),compact("artista"));
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
            'ruta' => ['required'],
            'album' => ['required','String', 'max:255'],
            'foto' => ['required','mimes:jpeg,png'],
            'genero_id' => ['required'],
        ]);

        $imagen = $request->file('foto');  
        $cancion = $request->file('ruta');
        //$request->hasFile('foto')
        if ($imagen) {
            //ponerle un nombre unico
            $imagen_nombre = time().$imagen->getClientOriginalName();
            // $imagen_redimensionada = Image::make($imagen);

            //Guardar la imagen
            Storage::disk('cancion')->put($imagen_nombre, File::get($imagen));
            // $imagen_redimensionada->resize(200,null,function($c){
            //     $c->aspectRatio();
            // })->save(storage_path('app/cancion/'.$imagen_nombre));

            $request->foto = $imagen_nombre;

        }
        
        if ($cancion) {
            $cancion_nombre =time().'_'.$cancion->getClientOriginalName();
            Storage::disk('canciones')->put($cancion_nombre, File::get($cancion));
            $request->ruta = $cancion_nombre;
        }
                $cancion=Cancion::create(
                [
                'nombre' => $request->nombre,
                'ruta' => $request->ruta,
                'album' => $request->album,
                'foto' => $request->foto,
                'genero_id' => $request->genero_id,
                'artista_id' => $request->artista_id,
                'status' => $request->status,
            ]
                );
                $message = "Cancion ". $cancion->nombre ." creada correctamente";

        return redirect()->route('canciones.index')->with('message',$message);
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $canciones = Cancion::findOrFail($id);
        return view('cancion.show',compact("canciones"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $canciones = Cancion::findOrFail($id);
        $generos = Genero::all();
        return view('cancion.edit')->with('cancion',$canciones)->with('genero',$generos);
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
        $validate = $this->validate($request, [
            'nombre' => ['required','String', 'max:255'],
            'album' => ['required','String', 'max:255'],
            'foto' => ['mimes:jpeg,png'],
            'genero_id' => ['required'], 
        ]);
        $imagen = $request->file('foto');  
        $ruta = $request->file('ruta');
        $cancion = Cancion::findOrFail($id); 
        if ($imagen) {
            //ponerle un nombre unico
            $imagen_nombre = time().$imagen->getClientOriginalName();
            // $imagen_redimensionada = Image::make($imagen);

            //Guardar la imagen
            // $imagen_redimensionada->resize(200,null,function($c){
            //     $c->aspectRatio();
            // })->save(storage_path('app/cancion/'.$imagen_nombre)); 
            Storage::disk('cancion')->put($imagen_nombre, File::get($imagen));
            Storage::disk('cancion')->delete($cancion->foto); 

            $cancion->foto = $imagen_nombre;

        }
        
        if ($ruta) {
            $cancion_nombre =time().'_'.$ruta->getClientOriginalName();
            Storage::disk('canciones')->put($cancion_nombre, File::get($ruta));
            Storage::disk('canciones')->delete($cancion->ruta); 
            $cancion->ruta = $cancion_nombre;
        }

        $cancion->nombre = $request->nombre;  
        $cancion->album = $request->album; 
        $cancion->genero_id = $request->genero_id; 
        $cancion->save(); 
        $message = "Cambios guardados correctamente";
        return redirect()->route('canciones.index')->with('message',$message);
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cancion = Cancion::findOrFail($id);
        $cancion->status=0;
        $cancion->save();
        Storage::disk('canciones')->delete($cancion->ruta); 
        $message = "Cancion eliminada ".$cancion->nombre ." correctamene";
        return redirect()->route('canciones.index')->with('message',$message);
    }

    public function index_usuario()
    {
        $genero = Genero::all();
        $canciones = Cancion::where('status',1)->get();
        return view('cancion.index_usuario')->with('canciones',$canciones)->with('generos',$genero);
    }

    //Obtener imagen de la musica
    public function getImage($fileName)
    {
        $file = Storage::disk('cancion')->get($fileName);
        return new Response($file, 200); 
    }

     //Obtener cancion
    public function getMusic($fileName)
    {
        $file = Storage::disk('canciones')->get($fileName);
        return $file;
    }

    
}
