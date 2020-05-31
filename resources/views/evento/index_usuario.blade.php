@extends('template.master_usuario')

@section('contenido_central')     
 <br/><br/><br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('eventos.create')}}">Agregar evento</a>  
 @if($eventos->isNotEmpty()) 

 <table class="table">
 	<thead class="thead-dark">
 	<tr> 
 	<th>Descripción</th>
    <th>Fecha Creación </th>
    <th>Fecha Inicio</th>
    <th>Hora Inicio </th> 
    <th>Calle </th>
    <th>Colonia </th>
    <th>Estado </th>
    <th>Municipio </th>
    <th>Nombre Locación </th>
    <th>Artista </th>
    <th>Ver </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($eventos as $evento)
 	<tr>
 		<td>{{$evento->descripcion}}</td>
 		<td>{{$evento->fecha_creacion}}</td>
 		<td>{{$evento->fecha_inicio}}</td>
 		<td>{{$evento->hora_inicio}}</td>
 		<td>{{$evento->calle}}</td>
 		<td>{{$evento->colonia}}</td>
 		<td>{{$evento->estado->nombre}}</td>
 		<td>{{$evento->municipio->nombre}}</td>
 		<td>{{$evento->nombre_locacion}}</td>
 		<td>{{$evento->artista->nombre}}</td>
 		<td>
 			<a href="{{route('eventos.show',$evento->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
            <a href="{{route('eventos.edit',$evento->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 