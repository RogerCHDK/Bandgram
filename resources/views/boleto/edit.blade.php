 @extends('template.master_artista')
@section('contenido_central')  
 
		<br/><br/><br/><br/> 
	{!! Form::open(['method' => 'PATCH','url' => 'boletos/'.$boletos->id]) !!} 
	@csrf 
	{!!Form::label('evento_id', 'Elige el evento: '); !!} 
	 {!!Form::select('evento_id', $evento->pluck('nombre_locacion','id'),$boletos->evento_id,['placeholder' => 'Evento']) !!}  
	 <br/> 
	{!!Form::label('precio', 'Ingresa el precio: '); !!} 
	{!!Form::number('precio',$boletos->precio)!!}
	<br/>
	{!!Form::label('stock', 'Ingresa el stock en existencia: '); !!} 
	{!!Form::number('stock',$boletos->stock)!!}
	<br/>
    {!!Form::submit('Enviar');!!} 
	{!! Form::close() !!}
	
	@endsection