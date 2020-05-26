@extends('template.master_usuario')

@section('contenido_central')  

<br/><br/><br/><br/>

 @if($videos->isNotEmpty()) 
 <table class="table">
 	<thead class="thead-dark">
 	<tr>
 	<th>Nombre</th>
    <th>Ruta </th>
    <th>Artista </th>
    <th>Acciones </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($videos as $video)
 	<tr>
 		<td>{{$video->nombre}}</td>
 		<td>{{$video->ruta}}</td>
 		<td>{{$video->artista->nombre}}</td>
 		<td>
 			<a href="{{route('videos.show',$video->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>

 @endif

@endsection 