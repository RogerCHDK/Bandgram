<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cancion;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
	 public function __construct() 
    {
        $this->middleware('auth:artista');
    }
    public function genera_pdf(){ 
    	return view('pdf.index');
    }

    public function crearPDF($datos,$vistaurl,$tipo){
    	$data = $datos;
    	$date = date('Y-m-d');
    	$view = \View::make($vistaurl,compact('data','date'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf->loadHTML($view);
    	if ($tipo == 1) {
    		return $pdf->stream('reporte');
    	}
    	if ($tipo == 2) {
    		return $pdf->download('reporte.pdf');
    	}
    }

    public function crear_reporte_canciones($tipo){
    	$artista = Auth::user()->id;
    	$vistaurl = "pdf.mis-canciones";
    	$canciones = Cancion::where('artista_id',$artista)->where('status',1)->orderBy('genero_id')->get();
    	return $this->crearPDF($canciones,$vistaurl,$tipo);
    }
}
