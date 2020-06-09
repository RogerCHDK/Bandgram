  @extends('template.master_usuario')

@section('contenido_central')    
 <br/><br/><br/><br/>

 @if($productos->isNotEmpty()) 

 <table class="table">
 	<thead class="thead-dark">
 	<tr>
 	<th>Nombre</th>
    <th>Precio </th>
    <th>Descripcion</th>
    <th>Artista </th> 
    <th>Categoria </th>
    <th>Stock </th> 
    <th>Acciones </th>
 	</tr>
 	 </thead>
 	 <tbody>
 	@foreach($productos as $producto)
 	<tr>
 		<td>{{$producto->nombre}}</td>
 		<td>{{$producto->precio}}</td>
 		<td>{{$producto->descripcion}}</td>
 		<td>{{$producto->artista->nombre}}</td>
 		<td>{{$producto->categoria->nombre}}</td>
 		<td>{{$producto->stock}}</td>
 		<td>
 			<a href="{{route('productos.show',$producto->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif 



 @endsection 