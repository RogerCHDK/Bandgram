@extends('template.master_artista')
 
@section('contenido_central')  

	<br/><br/><br/><br/>
	{!! Form::open(['method' => 'PATCH','url' => 'canciones/'.$cancion->id]) !!} 
	@csrf 
	<br/> 
	{!!Form::label('nombre', 'Nombre de la cancion: ')!!} 
    {!!Form::text('nombre', $cancion->nombre,['placeholder'=>'Ingresa el nombre de la canción'])!!}  
	<br/>
	{!!Form::label('album', 'Album: '); !!} 
    {!!Form::text('album', $cancion->album,['placeholder'=>'Ingresa el nombre del album']) !!} 
	<br/>
	{!!Form::label('genero_id', 'Género Musical: ') !!} 
	 {!!Form::select('genero_id', $genero->pluck('nombre','id'),$cancion->genero_id,['placeholder' => 'Genero']) !!} 
	 <br/> 
	 <br/> 
    {!!Form::submit('Enviar')!!} 
	{!! Form::close() !!}

@endsection 