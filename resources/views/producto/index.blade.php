  @extends('template.master_artista')

@section('contenido_central')    
 @if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
 <br/><br/><br/><br/>
 <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('productos.create')}}">Agregar producto</a> 

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
 			<a href="{{route('productos.edit',$producto->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
 			{!!Form::open(['method' =>'DELETE', 'url' =>'productos/'.$producto->id]) !!}
 			{!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
 			{!! Form::close() !!}
 		</td>

 	</tr>
 	 @endforeach 
 	  </tbody>

 </table>
@endif

 @endsection 