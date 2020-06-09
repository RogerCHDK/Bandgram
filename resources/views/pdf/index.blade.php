@extends('template.master_artista')
@section('contenido_central')  

<h2>Reportes</h2> 
<table class="table"> 
 	<thead class="thead-dark">
 	<tr>
 	<th>Reporte</th>
    <th>Ver </th> 
    <th>Descargar</th>
 	</tr>
 	 </thead>
 	 <tbody>
 	 	<tr>
 	 		<td>Reporte de mis canciones</td>
 	 		<td><a href="{{asset('reporte-cancion/1')}}" class="btn btn-primary" style="width: 250px; height: 45px;">Ver</a></td>
 	 		<td><a href="{{asset('reporte-cancion/2')}}" class="btn btn-primary" style="width: 250px; height: 45px;">Descargar</a></td>
 	 	</tr>
 	 	 </tbody>

 </table>
@endsection