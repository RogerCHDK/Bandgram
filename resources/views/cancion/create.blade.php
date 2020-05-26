 @extends('template.master_artista')
@section('contenido_central')  

		<br/><br/><br/><br/> 
	{!! Form::open(['url' => 'canciones','files' => true]) !!} 
	@csrf  
	<br/> 
	{!!Form::label('nombre', 'Nombre de la cancion: '); !!} 
    {!!Form::text('nombre', null,['placeholder'=>'Ingresa el nombre de la canción']); !!} 
	<br/>
	{!!Form::label('ruta', 'Selecciona la canción: '); !!} 
	{!!Form::file('ruta')!!} 
	<br/>
	{!!Form::label('album', 'Album: '); !!} 
    {!!Form::text('album', null,['placeholder'=>'Ingresa el nombre del album']); !!} 
	<br/>
	{!!Form::label('foto', 'Sube una foto: '); !!} 
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