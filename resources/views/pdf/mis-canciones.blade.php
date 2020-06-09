<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
<h1>Reporte de canciones</h1>
<h2>Fecha: {{$date}}</h2>
<table class="table">
	<thead class="thead-dark">
	 <tr>
 	<th>Nombre</th>
    <th>Ruta </th> 
    <th>Album</th>
    <th>Foto </th> 
    <th>Genero </th>
    <th>Artista </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($data as $cancion)
 	<tr>
 		<td>{{$cancion->nombre}}</td>
 		<td>{{$cancion->ruta}}</td>
 		<td>{{$cancion->album}}</td>
 		<td><img src="{{route('cancion.imagen',$cancion->foto)}}" style="min-width: 40%;max-height: 576px;"></td> 
 		<td>{{$cancion->genero->nombre}}</td>
 		<td>{{$cancion->artista->nombre}}</td>
 	</tr>
 	 @endforeach 
 	 	  </tbody>
</table>
</body>
</html>