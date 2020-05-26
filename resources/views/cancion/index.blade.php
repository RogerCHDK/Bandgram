@extends('template.master_artista')

@section('contenido_central')     
 <br/><br/><br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('canciones.create')}}">Agregar canción</a>  
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
    <th>Acciones </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($canciones as $cancion)
 	<tr>
 		<td>{{$cancion->nombre}}</td>
 		<td><audio src="{{route('cancion.audio',$cancion->ruta)}}" controls autoplay loop></td>
 		<td>{{$cancion->album}}</td>
 		<td><img src="{{route('cancion.imagen',$cancion->foto)}}" style="min-width: 40%;max-height: 576px;"> </td>
 		<td>{{$cancion->genero->nombre}}</td>
 		<td>{{$cancion->artista->nombre}}</td>
 		<td>
 			<a href="{{route('canciones.show',$cancion->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 			<a href="{{route('canciones.edit',$cancion->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 			{!!Form::open(['method' =>'DELETE', 'url' =>'canciones/'.$cancion->id]) !!}
 			{!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
 			{!! Form::close() !!}
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 