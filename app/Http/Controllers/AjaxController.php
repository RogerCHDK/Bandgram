<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado; 
use App\Municipio;
use App\Genero; 
use App\Cancion;

class AjaxController extends Controller
{
    public function municipios($estado_id){
    		$municipios = Municipio::select('id','nombre')
    		->where('estado_id',$estado_id)
    		->where('status',1)
    		->get();
    		return $municipios; 
    }

    public function filtrar_genero($genero_id){
    		$genero = Genero::where('id',$genero_id)->get();
    		$canciones = Cancion::where('genero_id',$genero_id)
    		->where('status',1)
    		->get();

    		$contenido_html ="
                    <div class='card-body'>
                        <div class='text-center'>
                            <h1 class='mb-4' style='font-size: 30px;color: rgb(38,125,36);'>";
            $contenido_html .= $genero[0]->nombre . "</h1>";
            $contenido_html .= "</div> 
                        <div class='row' id='canciones_contenido'>";

                        foreach($canciones as $cancion){
                        	$contenido_html .= "<div class='col-md-6 col-lg-4'>
                                <div class='card border-0'>
                                    <a href=";
                                    $contenido_html .= " \"{{route('canciones.show',";

                                    
                                   $contenido_html .= $cancion->id . ")}}\">";
                                   $contenido_html .= "<div class='marco zoom-on-hover'> 
                                        	<div class='text-center'>
                                            <img class='img-fluid image' src=\"cancion-imagen/";
                                    $contenido_html .= $cancion->foto . "\">";

                                    $contenido_html .= "</div> 
                                        </div>
                                    </a>
                                    <div class='card-body text-center'>
                                        <h6>
                                            <a class='event_title' href=\"{{route('canciones.show',";
                                            $contenido_html .= $cancion->id .")}}\" style=\"font-size: 22px;\">";
                                            $contenido_html .= $cancion->nombre . "<br></a>";
                                            $contenido_html .= " </h6>
                                    </div>
                                </div>
                            </div>";
                        }
                            
                      $contenido_html .="</div>
                    </div>";
    		return $contenido_html; 
    }

    public function mensaje($id){ 
        $cancion = Cancion::where('id',$id)->get();
        $message = "Cancion eliminada ".$cancion->nombre ." correctamene";
        $html_cont = "<div class='alert alert-success'>
                        {{ session(";
            $html_cont .= $message ."') }} </div>";
            
            return $html_cont; 
    }
}
