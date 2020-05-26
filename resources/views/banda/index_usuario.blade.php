@extends('template.master_usuario')

@section('contenido_central')     
 <br/><br/><br/><br/>
 @if($bandas->isNotEmpty())

 <table class="table">
 	<thead class="thead-dark">
 	<tr>
 	<th>Nombre</th>
    <th>Biografía </th>
    <th>Foto </th> 
    <th>Genero </th>
    <th>Creador </th>
    <th>Ver </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($bandas as $banda)
 	<tr>
 		<td>{{$banda->nombre}}</td>
 		<td>{{$banda->biografia}}</td>
 		<td>{{$banda->foto}}</td>
 		<td>{{$banda->genero->nombre}}</td>
 		<td>{{$banda->artista->nombre}}</td>
 		<td>
 			<a href="{{route('bandas.show',$banda->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 