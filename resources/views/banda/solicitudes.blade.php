@extends('template.master_artista')

@section('contenido_central')  
@if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif   
 <br/><br/>


<table class="table">
 	<thead class="thead-dark">
 	<tr>
 	<th>Nombre</th>
    <th>Foto </th> 
    <th>Integrante </th>
    <th>Acciones </th>
 	</tr>
 	 </thead>
 	 <tbody> 
 	 	@foreach($bandas as $banda)
 	 	@foreach($banda->integrantes as $integrante)
		@if($integrante->status == 0)
		<tr> 
		<td>{{$banda->nombre}}</td>
		<td><img src="{{route('banda.imagen',$banda->foto)}}" style="min-width: 40%;max-height: 576px;"></td>
		<td>{{$integrante->artista->nombre}}</td>
		<td>
 			{!!Form::open(['method' => 'PATCH','url' =>'integrantes/'.$integrante->id]) !!}
            {!!Form::submit('Unirse',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
 		</td>
 		</tr>
		@endif
		@endforeach 
		@endforeach 

 	
 	  </tbody>

 </table>

@endsection 