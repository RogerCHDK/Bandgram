@extends('template.master_artista')
@section('contenido_central')  
@if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Crear correo</p>
        </div> 
	<div class="card-body">   
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5">
                        {!! Form::open(['url' => 'enviar_correo','role' => 'form','files' => true]) !!} 
						@csrf  
						<div class="form-group row">
						{!!Form::label('destinatario', 'Para: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::text('destinatario', null,['placeholder'=>'Ingresa el destinatario','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						</div>
					     <div class="form-group row">
						{!!Form::label('asunto', 'Asunto: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::text('asunto', null,['placeholder'=>'Ingresa el asunto','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						</div>
					     <div class="form-group row">
					     	{!!Form::label('contenido_mail', 'Contenido: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!}
					     	{!!Form::textarea('contenido_mail',null,['class'=>'form-control form-control-user','placeholder'=>'Contenido mail','style'=>'font-size: 18px;color: rgb(0,0,0);height: 160px;'])!!}  
					     	</div>

					    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}  
						{!! Form::close() !!}
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
@endsection