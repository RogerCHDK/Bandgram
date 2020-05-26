@extends('template.master_artista')
 
@section('contenido_central')  

	<br/><br/><br/><br/> 
	{!! Form::open(['method' => 'PATCH','url' => 'productos/'.$producto->id]) !!} 
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre del producto: '); !!} 
    {!!Form::text('nombre', $producto->nombre,['placeholder'=>'Ingresa el nombre del producto']); !!} 
	<br/>
	{!!Form::label('precio', 'Ingresa el precio: '); !!} 
	{!!Form::number('precio',$producto->precio)!!}
	<br/>
	{!!Form::label('descripcion', 'Descripcion: '); !!} 
	{!!Form::textarea('descripcion',$producto->descripcion)!!} 
	<br/>
	{!!Form::label('categoria_id', 'Categoria: '); !!} 
	 {!!Form::select('categoria_id', $categoria->pluck('nombre','id'),$producto->categoria_id,['placeholder' => 'Categoria']) !!}  
	 <br/> 
	{!!Form::label('stock', 'Ingresa el stock en existencia: '); !!} 
	{!!Form::number('stock',$producto->stock)!!}
	<br/>
    {!!Form::submit('Enviar')!!} 
	{!! Form::close() !!}

@endsection 