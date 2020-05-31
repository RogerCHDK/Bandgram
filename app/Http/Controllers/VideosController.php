<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class VideosController extends Controller
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
        $videos=Video::where('artista_id',$artista)->where('status',1)->orderBy('nombre')->get();
        return view('video.index')->with('videos',$videos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $artista=Auth::user()->id;
        return view('video.create',compact("artista"));
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        if ($request->hasFile('ruta')) {
           $video = $request->file('ruta');
           $video_nombre = time().'_'.$video->getClientOriginalName();
           Storage::disk('videos')->put($video_nombre, File::get($video));
            $request->ruta = $video_nombre;
        }

        $video=Video::create(
                [
                'nombre' => $request->nombre,
                'ruta' => $request->ruta,
                'artista_id' => $request->artista_id,
                'status' => $request->status,
            ]
                );
        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $videos = Video::findOrFail($id);
        return view('video.show',compact("videos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos = Video::findOrFail($id);
        return view('video.edit')->with('videos',$videos);
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
        $video = Video::findOrFail($id); 
        $video->nombre = $request->nombre; 
        $video->ruta = $request->ruta; 
        $video->save(); 
        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->status=0;
        $video->save();
        return redirect()->route('videos.index');
    }

     public function index_usuario()
    {
        $videos = Video::all();
        return view('video.index_usuario',compact("videos")); 
    }
     //Obtener video
    public function getVideo($fileName)
    {
        $file = Storage::disk('videos')->get($fileName);
        return $file;
    }
}
