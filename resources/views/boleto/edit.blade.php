 @extends('template.master_artista')
@section('contenido_central')  
 
		<div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Editar Boleto</p>
        </div> 
	<div class="card-body">  
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7"> 
                    <div class="p-5"> 
						{!! Form::open(['method' => 'PATCH','url' => 'boletos/'.$boletos->id]) !!} 
						@csrf 
						{!!Form::label('evento_id', 'Elige el evento: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
						 {!!Form::select('evento_id', $evento->pluck('nombre_locacion','id'),$boletos->evento_id,['placeholder' => 'Evento','class'=>'form-control display-inline-block','style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']) !!}  
						 <br/> 
						{!!Form::label('precio', 'Ingresa el precio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::number('precio',$boletos->precio,['step'=>'any','placeholder'=>'Ingresa el precio','class'=>'form-control form-control-user','style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
						<br/>
						{!!Form::label('stock', 'Ingresa el stock en existencia: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::number('stock',$boletos->stock,['step'=>'any','placeholder'=>'Ingresa el stock en existencia','class'=>'form-control form-control-user','style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
						<br/>
					    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}  
						{!! Form::close() !!}
										</div>
					                </div>
					            </div>
					        </div>
					    </div>
	
	@endsection