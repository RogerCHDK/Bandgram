@extends('template.master_artista')
  
@section('contenido_central')  



	<br/><br/><br/><br/> 
	{!! Form::open(['method' => 'PATCH','url' => 'eventos/'.$evento->id]) !!} 
	@csrf  
	{!!Form::label('descripcion', 'Descripcion: '); !!} 
    {!!Form::textarea('descripcion', $evento->descripcion,['placeholder'=>'Ingresa la descripción']); !!} 
	<br/>
	{!!Form::label('fecha_inicio', 'Fecha de incio: '); !!} 
	{!!Form::date('fecha_inicio',$evento->fecha_inicio)!!}
	<br/> 
	{!!Form::label('hora_inicio', 'Hora de incio: '); !!} 
	{!!Form::time('hora_inicio',$evento->hora_inicio)!!} 
	<br/>
	{!!Form::label('calle', 'Calle: '); !!} 
    {!!Form::text('calle', $evento->calle,['placeholder'=>'Ingresa la calle']); !!} 
	<br/>
	{!!Form::label('colonia', 'Colonia: '); !!} 
    {!!Form::text('colonia', $evento->colonia,['placeholder'=>'Ingresa la colonia']); !!} 
	<br/>
	{!!Form::label('estado_id', 'Estado: '); !!} 
	{!!Form::select('estado_id', $estado->pluck('nombre','id'),$evento->estado_id,['placeholder' => 'Estado']) !!} 
	 <br/> 

	{!!Form::label('municipio_id', 'Municipio: '); !!} 
	{!!Form::select('municipio_id', $municipio->pluck('nombre','id'),$evento->municipio_id,['placeholder' => 'Municipio']) !!} 
	 <br/> 

	{!!Form::label('nombre_locacion', 'Nombre Locación: '); !!} 
    {!!Form::text('nombre_locacion', $evento->nombre_locacion,['placeholder'=>'Ingresa la locación']); !!} 
	<br/>
	 <br/> 
    {!!Form::submit('Enviar')!!} 
	{!! Form::close() !!}

@endsection 