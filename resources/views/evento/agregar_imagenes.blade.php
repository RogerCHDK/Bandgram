@extends('template.master_artista')
@section('contenido_central')  

		<div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Agregar imagenes al evento</p>
        </div> 
	<div class="card-body"> 
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7"> 
                    <div class="p-5">
							{!! Form::open(['url' => 'imagen-evento','files'=>true]) !!}
							@csrf 
							 <div class="form-group row">
							{!!Form::label('foto', 'Selecciona la foto: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::file('foto')!!}  
							</div>
							{!!Form::hidden('evento_id',$eventos->id); !!} 
							{!!Form::hidden('status', 1); !!}
							{!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!} 
	   									</div>
					                </div>
					            </div>
					        </div>
					    </div>


	@endsection