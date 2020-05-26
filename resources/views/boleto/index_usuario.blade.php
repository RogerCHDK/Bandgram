@extends('template.master_usuario')

@section('contenido_central')     
 <br/><br/><br/><br/>
 @if($boletos->isNotEmpty())

 <table class="table"> 
 	<thead class="thead-dark">
 	<tr>
 	<th>Precio</th>
    <th>Stock </th>
    <th>Evento</th>
    <th>Ver </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($boletos as $boleto)
 	<tr>
 		<td>{{$boleto->precio}}</td>
 		<td>{{$boleto->stock}}</td>
 		<td>{{$boleto->evento->nombre_locacion}}</td>
 		<td>
 			<a href="{{route('boletos.show',$boleto->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 			
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 