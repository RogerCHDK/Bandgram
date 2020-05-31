<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado; 
use App\Municipio;

class AjaxController extends Controller
{
    public function municipios($estado_id){
    		$municipios = Municipio::select('id','nombre')
    		->where('estado_id',$estado_id)
    		->where('status',1)
    		->get();
    		return $municipios; 
    }
}
