<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
<h1>Reporte de boletos</h1>
<h2>Fecha: {{$date}}</h2>
<table class="table">
	<thead class="thead-dark">
	 <tr>
 	<th>Numero pedido</th>
    <th>Evento </th> 
    <th>Precio</th>
     <th>Foto</th>
    <th>Comprador</th> 
 	</tr>
 	 </thead> 
 	 <tbody>
 	@foreach($data as $compras)
 	@if($compras->boleto->evento->artista_id  == $usuario)
 	<tr>
 		<td>{{$compras->id}}</td>
 		<td>{{$compras->boleto->evento->nombre_locacion}}</td>
 		<td>{{$compras->boleto->precio}}</td>
 		@foreach($compras->boleto->evento->fotos as $foto)  
 		<td width="150"><img class="d-block w-100" src="{{route('eventos.imagen',$foto->foto)}}" width="350" height="150"></td>	
 		@break
 		@endforeach
 		<td>{{$compras->usuario->nombre}}</td>
 	</tr>
 	@endif
 	 @endforeach 
 	 	  </tbody>
</table>
</body>
</html>