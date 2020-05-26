@extends('template.master_artista')
 
@section('contenido_central') 
<div class="row">
	<div class="col">	 
	<label> Descripcion :</label>
	<label>{{$eventos->descripcion}}</label>
	 </div> 
 </div> 

 <div class="row"> 
	<div class="col">	
	<label> Fecha de creación :</label>
	<label>{{$eventos->fecha_creacion}}</label>
	 </div>
 </div>

 <div class="row"> 
	<div class="col">	
	<label> Fecha de incio :</label>
	<label>{{$eventos->fecha_inicio}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Hora de incio :</label>
	<label>{{$eventos->hora_inicio}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Calle :</label>
	<label>{{$eventos->calle}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Colonia :</label>
	<label>{{$eventos->colonia}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Estado :</label>
	<label>{{$eventos->estado->nombre}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Municipio :</label>
	<label>{{$eventos->municipio->nombre}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Nombre Locación :</label>
	<label>{{$eventos->nombre_locacion}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Artista :</label>
	<label>{{$eventos->artista->nombre}}</label>
	 </div>
 </div>

@endsection 