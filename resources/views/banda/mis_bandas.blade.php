@extends('template.master_artista')

@section('contenido_central')     
 <br/><br/><br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('bandas.create')}}">Crear una banda</a>  
 @if($bandas->isNotEmpty())

 <table class="table">
 	<thead class="thead-dark">
 	<tr>
 	<th>Nombre</th> 
    <th>Biografía </th>
    <th>Foto </th> 
    <th>Genero </th>
    <th>Creador </th> 
    <th>Acciones </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($bandas as $banda)
 	<tr>
 		<td>{{$banda->nombre}}</td>
 		<td>{{$banda->biografia}}</td>
 		<td><img src="{{route('banda.imagen',$banda->foto)}}" style="min-width: 40%;max-height: 576px;"></td>
 		<td>{{$banda->genero->nombre}}</td>
 		<td>{{$banda->artista->nombre}}</td>
 		<td>
 			<a href="{{route('bandas.show',$banda->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 			<a href="{{route('bandas.edit',$banda->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 			{!!Form::open(['method' =>'DELETE', 'url' =>'bandas/'.$banda->id]) !!}
 			{!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
 			{!! Form::close() !!}
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 