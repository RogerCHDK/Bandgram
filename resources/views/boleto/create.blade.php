 @extends('template.master_artista')
@section('contenido_central')  
 
		<br/><br/><br/><br/> 
	{!! Form::open(['url' => 'boletos']) !!} 
	@csrf 
	{!!Form::label('evento_id', 'Elige el evento: '); !!} 
	 {!!Form::select('evento_id', $evento->pluck('nombre_locacion','id'),null,['placeholder' => 'Evento']) !!}  
	 <br/> 
	{!!Form::label('precio', 'Ingresa el precio: '); !!} 
	{!!Form::number('precio')!!}
	<br/>
	{!!Form::label('stock', 'Ingresa el stock en existencia: '); !!} 
	{!!Form::number('stock')!!}
	<br/>
	{!!Form::hidden('status', 1); !!}
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection