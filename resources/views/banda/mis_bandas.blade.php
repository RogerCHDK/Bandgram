@extends('template.master_artista')

@section('contenido_central')  
@if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif   
 <br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('bandas.create')}}">Crear una banda</a>  
 <br/><br/>
 @if($integrantes->isNotEmpty())

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
 	@foreach($integrantes as $integrante) 
 	@if($integrante->status == 1)
 	<tr>
 		<td>{{$integrante->banda->nombre}}</td>
 		<td>{{$integrante->banda->biografia}}</td>
 		<td><img src="{{route('banda.imagen',$integrante->banda->foto)}}" style="min-width: 40%;max-height: 576px;"></td>
 		<td>{{$integrante->banda->genero->nombre}}</td> 
 		<td>{{$integrante->banda->artista->nombre}}</td>
 		<td>
 			<a href="{{route('bandas.show',$integrante->banda->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 			<a href="{{route('bandas.edit',$integrante->banda->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 			{!!Form::open(['method' =>'DELETE', 'url' =>'bandas/'.$integrante->banda->id]) !!}
 			{!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
 			{!! Form::close() !!}
 		</td>

 	</tr>
 	@endif
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 