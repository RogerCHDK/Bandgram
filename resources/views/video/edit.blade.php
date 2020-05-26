@extends('template.master_artista')
 
@section('contenido_central') 

	<br/><br/><br/><br/>
	{!! Form::open(['method' => 'PATCH','url' => 'videos/'.$videos->id]) !!} 
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre del video: ')!!} 
    {!!Form::text('nombre', $videos->nombre,['placeholder'=>'Ingresa el nombre del video'])!!} 
	<br/> 
	{!!Form::label('ruta', 'Selecciona el video: '); !!} 
	{!!Form::file('ruta')!!}
	<br/>
	 <br/> 
    {!!Form::submit('Enviar')!!} 
	{!! Form::close() !!}

@endsection 