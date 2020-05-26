@extends('template.master')
@section('contenido_central')


	
	<div class="container d-flex h-100 align-items-center">
		
		<br/> 
	{!! Form::open(['url' => 'register']) !!}

	@csrf  
    
    {!!Form::label('nombre', 'Nombre gg: '); !!} 
    {!!Form::text('nombre', null,['placeholder'=>'Ingresa tu nombre']); !!} 
<br/>
    {!!Form::label('ap_paterno', 'Apellido Paterno: '); !!} 
    {!!Form::text('ap_paterno', null,['placeholder'=>'Ingresa tu apellido paterno']); !!} 
<br/>
	{!!Form::label('ap_materno', 'Apellido Materno: '); !!} 
    {!!Form::text('ap_materno', null,['placeholder'=>'Ingresa tu apellido materno']); !!} 
<br/>
	{!!Form::label('fecha_nacimiento', 'Fecha de nacimiento: '); !!} 
	{!!Form::date('fecha_nacimiento')!!}
<br/> 
	{!!Form::select('genero', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['placeholder' => 'Genero']);!!} 
<br/>
	{!!Form::label('calle', 'Calle: '); !!} 
    {!!Form::text('calle', null,['placeholder'=>'Calle']); !!} 
<br/>
	{!!Form::label('colonia', 'Colonia: '); !!} 
    {!!Form::text('colonia', null,['placeholder'=>'Colonia']); !!} 
<br/>
	{!!Form::label('email', 'Email: '); !!}
	{!!Form::email('email');!!} 
	<br/>	
	{!!Form::label('password', 'Contraseña: '); !!}
	{!!Form::password('password')!!}
	<br/>	
	{!!Form::hidden('estado_id', 1); !!}
	{!!Form::hidden('municipio_id', 1); !!}
	{!!Form::hidden('tipo_usuario', 1); !!}
	{!!Form::hidden('status', 1); !!}
	<br/>
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	</div>