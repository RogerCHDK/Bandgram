@extends('template.master')
@section('contenido_central')

		<br/><br/><br/><br/>
	{!! Form::open(['url' => 'register']) !!}

	@csrf  
    
    {!!Form::label('nombre', 'Nombre: '); !!} 
    {!!Form::text('nombre', null,['placeholder'=>'Ingresa tu nombre']); !!} 
<br/>
    {!!Form::label('ap_paterno', 'Apellido Paterno: '); !!} 
    {!!Form::text('ap_paterno', null,['placeholder'=>'Ingresa tu apellido paterno']); !!} 
<br/>
	{!!Form::label('ap_materno', 'Apellido Materno: '); !!} 
    {!!Form::text('ap_materno', null,['placeholder'=>'Ingresa tu apellido materno']); !!} 
<br/>
	{!!Form::label('foto', 'Sube una foto: '); !!} 
	{!!Form::file('foto')!!}
<br/>
	{!!Form::label('email', 'Email: '); !!} 
	{!!Form::email('email');!!}  
	<br/>	
	{!!Form::label('password', 'Contraseña: '); !!}
	{!!Form::password('password')!!}
	<br/>	
	{!!Form::label('genero_id', 'Género Musical: '); !!} 
	 {!!Form::select('genero_id', $genero->pluck('nombre','id'),null,['placeholder' => 'Genero']) !!} 
	 <br/>  
	{!!Form::label('biografia', 'Descripcion: '); !!} 
	{!!Form::textarea('biografia')!!} 
<br/>
	{!!Form::hidden('tipo_usuario', 2); !!} 
	{!!Form::hidden('status', 1); !!}
	<br/>
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection