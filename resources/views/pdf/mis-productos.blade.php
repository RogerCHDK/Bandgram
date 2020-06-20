<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
<h1>Reporte de productos</h1>
<h2>Fecha: {{$date}}</h2>
<table class="table">
	<thead class="thead-dark">
	 <tr>
 	<th>Numero pedido</th>
    <th>Producto </th> 
    <th>Precio</th>
     <th>Foto</th>
    <th>Comprador</th> 
 	</tr>
 	 </thead> 
 	 <tbody>
 	@foreach($data as $compras)
 	@if($compras->producto->artista_id  == $usuario)
 	<tr>
 		<td>{{$compras->id}}</td>
 		<td>{{$compras->producto->nombre}}</td>
 		<td>{{$compras->producto->precio}}</td>
 		@foreach($compras->producto->fotos as $foto)  
 		<td width="150"><img class="d-block w-100" src="{{route('productos.imagen',$foto->foto)}}" width="350" height="150"></td>	
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