@extends('template.master_artista')
 
@section('contenido_central') 

	<div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Editar video</p>
        </div> 
	<div class="card-body">   
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5">  
						{!! Form::open(['method' => 'PATCH','url' => 'videos/'.$videos->id,'files' => true]) !!} 
						@csrf 
						<br/>   
						{!!Form::label('nombre', 'Nombre del video: ',['style'=>'font-size: 18px;color: rgb(0,0,0);'])!!} 
					    {!!Form::text('nombre', $videos->nombre,['placeholder'=>'Ingresa el nombre del video','class' => 'form-control form-control-user'.($errors->has('nombre') ? ' is-invalid' : ''),'type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);'])!!} 
					    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
						<br/> 
						{!!Form::label('ruta', 'Selecciona el video: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::file('ruta',['class'=>''.($errors->has('ruta') ? ' is-invalid' : '')])!!}
						@error('ruta')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
						<br/>
						 <br/> 
					    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}
						{!! Form::close() !!}
										</div>
					                </div>
					            </div>
					        </div>
					    </div>

@endsection 