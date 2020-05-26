@extends('template.master_artista')
 
@section('contenido_central') 
<div class="row">
	<div class="col">	 
	<label> Nombre :</label>
	<label>{{$canciones->nombre}}</label>
	 </div> 
 </div> 

 <div class="row">
	<div class="col">	
	<label> Ruta :</label>
	<label>{{$canciones->ruta}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Album :</label>
	<label>{{$canciones->album}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Foto :</label>
	<label>{{$canciones->foto}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Genero :</label>
	<label>{{$canciones->genero->nombre}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Artista :</label>
	<label>{{$canciones->artista->nombre}}</label>
	 </div>
 </div>

@endsection 