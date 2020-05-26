@extends('template.master_artista')
 
@section('contenido_central') 
<div class="row">
	<div class="col">	 
	<label> Nombre :</label>
	<label>{{$videos->nombre}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Ruta :</label>
	<label>{{$videos->ruta}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Artista :</label>
	<label>{{$videos->artista->nombre}}</label>
	 </div>
 </div>

@endsection 