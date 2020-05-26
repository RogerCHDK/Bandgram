@extends('template.master_artista')
@section('contenido_central')  

		<br/><br/><br/><br/> 
	{!! Form::open(['url' => 'productos']) !!} 
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre del producto: '); !!} 
    {!!Form::text('nombre', null,['placeholder'=>'Ingresa el nombre del producto']); !!} 
	<br/>
	{!!Form::label('precio', 'Ingresa el precio: '); !!} 
	{!!Form::number('precio')!!}
	<br/>
	{!!Form::label('descripcion', 'Descripcion: '); !!} 
	{!!Form::textarea('descripcion')!!} 
	<br/>
	{!!Form::label('categoria_id', 'Categoria: '); !!} 
	 {!!Form::select('categoria_id', $categoria->pluck('nombre','id'),null,['placeholder' => 'Categoria']) !!}  
	 <br/> 
	{!!Form::label('stock', 'Ingresa el stock en existencia: '); !!} 
	{!!Form::number('stock')!!}
	<br/>
	 {!!Form::hidden('artista_id',$artista); !!} 
	{!!Form::hidden('status', 1); !!}
	 <br/> 
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection