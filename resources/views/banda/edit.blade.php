@extends('template.master_artista')
@section('contenido_central')  

		<br/><br/><br/><br/> 
	{!! Form::open(['method' => 'PATCH','url' => 'bandas/'.$bandas->id]) !!} 
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre de la banda: '); !!} 
    {!!Form::text('nombre', $bandas->nombre,['placeholder'=>'Ingresa el nombre de la canción']); !!} 
	<br/>
	{!!Form::label('biografia', 'Biografía: '); !!} 
    {!!Form::textarea('biografia', $bandas->biografia,['placeholder'=>'Ingresa la biografía']); !!}  
	<br/>
	{!!Form::label('foto', 'Selecciona una foto: '); !!} 
	{!!Form::file('foto')!!}
	<br/>
	{!!Form::label('genero_id', 'Género Musical: '); !!} 
	 {!!Form::select('genero_id', $genero->pluck('nombre','id'),$bandas->genero_id,['placeholder' => 'Genero']) !!} 
	 <br/> 
	 <br/> 
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection