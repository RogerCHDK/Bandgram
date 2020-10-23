 @extends('template.master_usuario')


@section('contenido_central')  
	<div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Comprar Producto</p>
        </div> 
	<div class="card-body"> 
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7"> 
                    <div class="p-5">
 
							{!! Form::open(['url' => 'tarjetas']) !!}  
							@csrf 
							<div class="form-group row"> 
							{!!Form::label('titular', 'Nombre del Titular: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::text('titular', $usuario->nombre." ".$usuario->ap_paterno." ". $usuario->ap_materno,['placeholder'=>'Ingresa el nombre del titular','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
							<div class="form-group row"> 
							{!!Form::label('tarjeta', 'Número de tarjeta: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::number('tarjeta',null,['step'=>'any','placeholder'=>'Ingresa numero de tarjeta','class'=>'form-control form-control-user','style'=>'font-size: 18px;color: rgb(0,0,0);']);!!}
							</div>
							<div class="form-group row">
							{!!Form::label('fecha', 'Fecha de expiracion: ',['style'=>'font-size: 18px;color: rgb(0,0,0);' 
							,'class'=>'form-control form-control-user']); !!} 
							{!!Form::number('fecha',null,['step'=>'any','placeholder'=>'Ingresa el mes','style'=>'font-size: 18px;color: rgb(0,0,0);']);!!}
							{!!Form::number('fecha',null,['step'=>'any','placeholder'=>'Ingresa el año','style'=>'font-size: 18px;color: rgb(0,0,0);']);!!}
							</div> 
							<div class="form-group row">
							{!!Form::label('cv', 'Codigo de seguridad: ',['style'=>'font-size: 18px;color: rgb(0,0,0);','class'=>'form-control form-control-user']); !!}
							{!!Form::number('fecha',null,['step'=>'any','placeholder'=>'Ingresa el CV','style'=>'font-size: 18px;color: rgb(0,0,0);']);!!} 
							</div> 
							{!!Form::hidden('producto_id',$productos->id); !!} 
							{!!Form::hidden('status', 1); !!}
						    {!!Form::submit('Confirmar compra',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}  
							{!! Form::close() !!}
								
					                </div>
					            </div>
					        </div>
					    </div>

@endsection 