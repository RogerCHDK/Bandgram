@extends('template.master_usuario')

@section('contenido_central')     
 <br/><br/><br/><br/> 
 @if($canciones->isNotEmpty())

 <table class="table">
 	<thead class="thead-dark">
 	<tr>
 	<th>Nombre</th>
    <th>Ruta </th>
    <th>Album</th>
    <th>Foto </th> 
    <th>Genero </th>
    <th>Artista </th>
    <th>Ver</th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($canciones as $cancion)
 	<tr>
 		<td>{{$cancion->nombre}}</td>
 		<td>{{$cancion->ruta}}</td>
 		<td>{{$cancion->album}}</td> 
 		<td>{{$cancion->foto}}</td>
 		<td>{{$cancion->genero->nombre}}</td>
 		<td>{{$cancion->artista->nombre}}</td>
 		<td>
 			<a href="{{route('canciones.show',$cancion->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 