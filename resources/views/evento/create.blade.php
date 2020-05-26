@extends('template.master_artista')
@section('contenido_central')  

		<br/><br/><br/><br/>  
	{!! Form::open(['url' => 'eventos']) !!}  
	@csrf 
	<br/> 
	{!!Form::label('descripcion', 'Descripcion: '); !!} 
    {!!Form::textarea('descripcion', null,['placeholder'=>'Ingresa la descripción']); !!} 
	<br/>
	{!!Form::label('fecha_inicio', 'Fecha de incio: '); !!} 
	{!!Form::date('fecha_inicio')!!}
	<br/> 
	{!!Form::label('hora_inicio', 'Hora de incio: '); !!} 
	{!!Form::time('hora_inicio')!!} 
	<br/>
	{!!Form::label('calle', 'Calle: '); !!} 
    {!!Form::text('calle', null,['placeholder'=>'Ingresa la calle']); !!} 
	<br/>
	{!!Form::label('colonia', 'Colonia: '); !!} 
    {!!Form::text('colonia', null,['placeholder'=>'Ingresa la colonia']); !!} 
	<br/>
	{!!Form::label('estado_id', 'Estado: '); !!} 
	{!!Form::select('estado_id', $estado->pluck('nombre','id'),null,['placeholder' => 'Estado']) !!} 
	 <br/> 

	{!!Form::label('municipio_id', 'Municipio: '); !!} 
	{!!Form::select('municipio_id', $municipio->pluck('nombre','id'),null,['placeholder' => 'Municipio']) !!} 
	 <br/> 

	{!!Form::label('nombre_locacion', 'Nombre Locación: '); !!} 
    {!!Form::text('nombre_locacion', null,['placeholder'=>'Ingresa la locación']); !!} 
	<br/>

	 {!!Form::hidden('artista_id',$artista); !!} 
	{!!Form::hidden('status', 1); !!}
	{!!Form::hidden('fecha_creacion', \Carbon\Carbon::now())!!}
	 <br/> 
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection 