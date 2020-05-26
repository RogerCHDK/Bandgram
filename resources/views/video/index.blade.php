@extends('template.master_artista')

@section('contenido_central')  

<br/><br/><br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('videos.create')}}">Agregar video</a>  

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
 		<td><video src="{{route('video.media',$video->ruta)}}" width="300" height="300" controls></video></td>
 		<td>{{$video->artista->nombre}}</td> 
 		<td>
 			<a href="{{route('videos.show',$video->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 			<a href="{{route('videos.edit',$video->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 			{!!Form::open(['method' =>'DELETE', 'url' =>'videos/'.$video->id]) !!}
 			{!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
 			{!! Form::close() !!}
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>

 @endif

@endsection 