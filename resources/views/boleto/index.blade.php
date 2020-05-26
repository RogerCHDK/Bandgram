@extends('template.master_artista')

@section('contenido_central')     
 <br/><br/><br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('boletos.create')}}">Agregar boleto</a>  
 @if($boletos->isNotEmpty())

 <table class="table"> 
 	<thead class="thead-dark">
 	<tr>
 	<th>Precio</th>
    <th>Stock </th>
    <th>Evento</th>
    <th>Acciones </th>
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
 			<a href="{{route('boletos.edit',$boleto->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 			{!!Form::open(['method' =>'DELETE', 'url' =>'boletos/'.$boleto->id]) !!}
 			{!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
 			{!! Form::close() !!}
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

@endsection 