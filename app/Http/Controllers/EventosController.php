<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Evento;
use App\Estado; 
use App\Municipio;
use App\FotoEvento;
use App\Asistencia;
use App\Http\Requests; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Response;
 
 

class EventosController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    {
        $this->middleware('artista',['except'=>['index_usuario','show','getImage','show_usuario','asistir','mis_eventos']]); 
        $this->middleware('auth:artista',['except'=>['index_usuario','show','getImage','show_usuario','asistir','mis_eventos']]);
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
        $validate = $this->validate($request, [
            'descripcion' => ['required','String'],
            'fecha_inicio' => ['required','date'],
            'hora_inicio' => ['required'],
            'calle' => ['required','String','max:255'],
            'colonia' => ['required','String','max:255'],
            'estado_id' => ['required'],
            'municipio_id' => ['required'],
            'nombre_locacion' => ['required','String','max:255'],
        ]);
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
        $fotos = FotoEvento::where('evento_id',$id)->get();
        //$bandera = true;
        return view('evento.show')->with('eventos',$eventos)->with('fotos',$fotos);
    } 
     public function show_usuario($id) 
    {
        $eventos = Evento::findOrFail($id); 
        $fotos = FotoEvento::where('evento_id',$id)->get();
        //$bandera = true;
        return view('evento.show_usuario')->with('eventos',$eventos)->with('fotos',$fotos);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Evento::findOrFail($id);
        $estado = Estado::all();
        $municipio = Municipio::where("estado_id",$eventos->estado_id)->get();
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
        $eventos = Evento::where('status',1)->get();
        return view('evento.index_usuario',compact("eventos"));
    }

    public function imagen($id)
    { 
        $eventos = Evento::findOrFail($id);
        return view('evento.agregar_imagenes',compact("eventos")); 
    }

    public function crear_imagen(Request $request)
    { 
        $imagen = $request->file('foto');  
        $message = "";
        if ($imagen) {
             //ponerle un nombre unico
            $imagen_nombre = time().$imagen->getClientOriginalName();
            // $imagen_redimensionada = Image::make($imagen);

            // $imagen_redimensionada->resize(200,null,function($c){
            //     $c->aspectRatio(); 
            // })->save(storage_path('app/eventos/'.$imagen_nombre));
            Storage::disk('eventos')->put($imagen_nombre, File::get($imagen));
            $foto_evento=FotoEvento::create(
                [
                'nombre' => $request->nombre, 
                'foto' => $imagen_nombre,
                'evento_id' => $request->evento_id,
                'status' => $request->status,
            ]
                );
            $message = "Foto agregada"; 
        } 

        
        return redirect()->route('eventos.index')->with('message',$message);
    }

    //Obtener la imagen
    public function getImage($fileName)
    {
        $file = Storage::disk('eventos')->get($fileName);
        return new Response($file, 200);   
    }

     public function asistir(Request $request)
    {
        $usuario = \Auth::user()->id; 
        $asistencia=Asistencia::create(
                [
                'evento_id' => $request->evento_id, 
                'user_id' => $usuario, 
                'status' => $request->status,
            ] 
 
        );
        $message = "Evento agregado"; 
        return redirect()->route('eventos.index_usuario')->with('message',$message);
    }

     public function mis_eventos()
     {
        $usuario = \Auth::user()->id;
        $asistencias = Asistencia::where('user_id',$usuario)->get();  
        return view('evento.mis_eventos',compact("asistencias"));   
    }


}
