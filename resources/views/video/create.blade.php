@extends('template.master_artista')
@section('contenido_central')  

		<br/><br/><br/><br/>
	{!! Form::open(['url' => 'videos','files' => true]) !!}
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre del video: '); !!} 
    {!!Form::text('nombre', null,['placeholder'=>'Ingresa el nombre del video']); !!} 
	<br/>
	{!!Form::label('ruta', 'Selecciona el video: '); !!} 
	{!!Form::file('ruta')!!}
	<br/>
	 {!!Form::hidden('artista_id',$artista); !!} 
	{!!Form::hidden('status', 1); !!}
	 <br/> 
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection