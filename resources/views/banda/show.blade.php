@extends('template.master_artista')
 
@section('contenido_central') 
<div class="row">
	<div class="col">	 
	<label> Nombre :</label>
	<label>{{$bandas->nombre}}</label>
	 </div> 
 </div> 

 <div class="row">
	<div class="col">	
	<label> Biografía :</label>
	<label>{{$bandas->biografia}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Foto :</label>
	<label>{{$bandas->foto}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Genero :</label>
	<label>{{$bandas->genero->nombre}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Creador :</label>
	<label>{{$bandas->artista->nombre}}</label>
	 </div>
 </div>

@endsection 