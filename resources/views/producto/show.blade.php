@extends('template.master_artista')
 
@section('contenido_central') 
<div class="row">
	<div class="col">	 
	<label> Nombre :</label>
	<label>{{$productos->nombre}}</label>
	 </div>
 </div> 

 <div class="row">
	<div class="col">	
	<label> Precio :</label>
	<label>{{$productos->precio}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Descripcion :</label>
	<label>{{$productos->descripcion}}</label>
	 </div>
 </div>

 <div class="row">
	<div class="col">	
	<label> Categoria :</label>
	<label>{{$productos->categoria->nombre}}</label>
	 </div>
 </div>

  <div class="row">
	<div class="col">	
	<label> Stock :</label>
	<label>{{$productos->stock}}</label>
	 </div>
 </div>


 <div class="row">
	<div class="col">	
	<label> Artista :</label>
	<label>{{$productos->artista->nombre}}</label>
	 </div>
 </div>

@endsection 