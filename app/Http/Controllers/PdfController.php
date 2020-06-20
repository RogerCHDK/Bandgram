<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cancion;
use App\Compra;
use App\CompraBoleto;
use App\Evento;
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

    public function crearPDF($datos,$vistaurl,$tipo,$usuario){
    	$data = $datos; 
    	$date = date('Y-m-d');
    	$view = \View::make($vistaurl,compact('data','date','usuario'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf->loadHTML($view);
    	if ($tipo == 1) {
    		return $pdf->stream('reporte');
    	}
    	if ($tipo == 2) {
    		return $pdf->download('reporte.pdf');
    	}
    }

    public function crear_reporte_eventos($tipo){
    	$usuario = Auth::user()->id; 
    	$vistaurl = "pdf.mis-canciones"; 
    	$eventos = Evento::where('artista_id',$usuario)->where('status',1)->get();
    	return $this->crearPDF($eventos,$vistaurl,$tipo,$usuario);
    }

     public function crear_reporte_productos($tipo){
        $usuario = Auth::user()->id;
        $vistaurl = "pdf.mis-productos"; 
        $compras = Compra::where('status',1)->get(); 
        return $this->crearPDF($compras,$vistaurl,$tipo,$usuario); 
    }

    public function crear_reporte_boletos($tipo){
        $usuario = Auth::user()->id;
        $vistaurl = "pdf.mis-boletos";  
        $compras = CompraBoleto::where('status',1)->get();
        return $this->crearPDF($compras,$vistaurl,$tipo,$usuario);
    }
}
