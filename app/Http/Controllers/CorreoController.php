<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use App\Order;
use App\Mail\OrderShipped;
use App\Mail\Message;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;	


class CorreoController extends Controller
{
    public function create(){
    	return view('correo.create');
    }

    public function enviar(Request $request){
    	$pathToFile = "";
    	$containfile = false;

    	$destinatario = $request->destinatario;
    	$asunto = $request->asunto;
    	$contenido = $request->contenido_mail;

    	$data = array('contenido' => $contenido);
    	$r = Mail::send('correo.plantilla_correo',$data, function($message) use ($asunto,$destinatario,$containfile,$pathToFile){
    		$message->from('rogelio.macho.10@gmail.com','Rogelio Perez');
    		$message->to($destinatario)->subject($asunto);
    	});

    	if (!$r) {
    		$mensaje = "Correo enviado correctamente";
    		return view('correo.create')->with('message',$mensaje);
    	}else{
    		$mensaje = "Error al enviar mensaje";
    		return view('correo.create')->with('message',$mensaje);
    	}


    	
    }
}
