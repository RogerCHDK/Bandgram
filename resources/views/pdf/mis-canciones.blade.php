<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
<h1>Reporte de eventos</h1>
<h2>Fecha: {{$date}}</h2>
<table class="table">
	<thead class="thead-dark">
	 <tr>
 	<th>Nombre Locacion</th>
    <th>Descripcion </th>  
    <th>Asistentes</th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($data as $evento)
 	<tr>
 		<td>{{$evento->nombre_locacion}}</td>
 		<td>{{$evento->descripcion}}</td>
 		<td>{{$evento->asistencia->count()}}</td>
 	</tr>
 	 @endforeach 
 	 	  </tbody>
</table>
</body>
</html>