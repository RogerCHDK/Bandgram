 @extends('template.master_artista')
@section('contenido_central')  
 
		<div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Crear Boleto</p>
        </div> 
	<div class="card-body">  
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7"> 
                    <div class="p-5"> 
						{!! Form::open(['url' => 'boletos']) !!} 
						@csrf 
						<div class="form-group row"> 
						{!!Form::label('evento_id', 'Elige el evento: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
						 {!!Form::select('evento_id', $evento->pluck('nombre_locacion','id'),null,['placeholder' => 'Evento' ,'class'=>'form-control display-inline-block'.($errors->has('evento_id') ? ' is-invalid' : ''),'style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']) !!}  
						 @error('evento_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
						 </div>
						<div class="form-group row">
						{!!Form::label('precio', 'Precio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::number('precio',null,['step'=>'any','placeholder'=>'Ingresa el precio','class'=>'form-control form-control-user'.($errors->has('precio') ? ' is-invalid' : ''),'style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
						@error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
						</div>
						<div class="form-group row">
						{!!Form::label('stock', 'Stock: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::number('stock',null,['step'=>'any','placeholder'=>'Ingresa el stock en existencia','class'=>'form-control form-control-user'.($errors->has('stock') ? ' is-invalid' : ''),'style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
						@error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
						</div>
						{!!Form::hidden('status', 1); !!}
					    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}  
						{!! Form::close() !!}
										</div>
					                </div>
					            </div>
					        </div>
					    </div>
	
	@endsection