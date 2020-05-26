@extends('template.master_artista')
@section('contenido_central')  

		<br/><br/><br/><br/> 
	{!! Form::open(['url' => 'bandas']) !!} 
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre de la banda: '); !!} 
    {!!Form::text('nombre', null,['placeholder'=>'Ingresa el nombre de la canción']); !!} 
	<br/>
	{!!Form::label('biografia', 'Biografía: '); !!} 
    {!!Form::textarea('biografia', null,['placeholder'=>'Ingresa la biografía']); !!}  
	<br/>
	{!!Form::label('foto', 'Selecciona una foto: '); !!} 
	{!!Form::file('foto')!!}
	<br/>
	{!!Form::label('genero_id', 'Género Musical: '); !!} 
	 {!!Form::select('genero_id', $genero->pluck('nombre','id'),null,['placeholder' => 'Genero']) !!} 
	 <br/> 
	 {!!Form::hidden('artista_id',$artista); !!} 
	{!!Form::hidden('status', 1); !!}
	 <br/> 
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection