@extends('template.master_artista')
 
@section('contenido_central') 

 <div class="row">
	<div class="col">	
	<label> Precio :</label>
	<label>{{$boletos->precio}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Stock :</label>
	<label>{{$boletos->stock}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Artista :</label>
	<label>{{$boletos->evento->nombre_locacion}}</label>
	 </div>
 </div>

@endsection 