@extends('template.master_artista')

<script>
  function llenar_municipios(estado_id){
    $("#municipio_id").empty();
    var asset = '{{asset('')}}';
    var ruta = asset + 'combo_municipios/'+estado_id;
    //alert(ruta);
    
    $.ajax({
      type: 'GET',
      url: ruta,
      success:function(data){
        var municipios = data;
		for(var i = 0; i< municipios.length; i++){
			$("#municipio_id").append('<option value="'+ municipios[i].id + '">'+ municipios[i].nombre
				+ '</option>');
		}
      }
    });

  }
</script>
@section('contenido_central')  

		<div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Crear Evento</p>
        </div> 
	<div class="card-body">  
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5">   
							{!! Form::open(['url' => 'eventos']) !!}  
							@csrf 
							<div class="form-group row"> 
							{!!Form::label('descripcion', 'Descripcion: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::textarea('descripcion', null,['class'=>'form-control form-control-user','placeholder'=>'Ingresa la descripción','style'=>'font-size: 18px;color: rgb(0,0,0);height: 160px;']); !!} 
							</div>
							<div class="form-group row">
							{!!Form::label('fecha_inicio', 'Fecha de incio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::date('fecha_inicio',null,['class'=>'form-control form-control-user'])!!}
							</div>
							<div class="form-group row">
							{!!Form::label('hora_inicio', 'Hora de incio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::time('hora_inicio',null,['class'=>'form-control form-control-user'])!!} 
							</div>
							<div class="form-group row">
							{!!Form::label('estado_id', 'Estado: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
							{!!Form::select('estado_id', $estado->pluck('nombre','id'),null,['placeholder' => 'Estado','class'=>'form-control display-inline-block','style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);','onchange'=>'llenar_municipios(this.value);']) !!} 
							</div>
							<div class="form-group row">
							{!!Form::label('municipio_id', 'Municipio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
							{!!Form::select('municipio_id', array(''=>'Seleccionar ..'),null,['placeholder' => 'Municipio','class'=>'form-control display-inline-block','style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']) !!} 
							 </div>
							<div class="form-group row">
							{!!Form::label('calle', 'Calle: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('calle', null,['placeholder'=>'Ingresa la calle','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
							<div class="form-group row">
							{!!Form::label('colonia', 'Colonia: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('colonia', null,['placeholder'=>'Ingresa la colonia','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
							<div class="form-group row">
							{!!Form::label('nombre_locacion', 'Nombre Locación: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('nombre_locacion', null,['placeholder'=>'Ingresa la locación','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
							 {!!Form::hidden('artista_id',$artista); !!} 
							{!!Form::hidden('status', 1); !!}
							{!!Form::hidden('fecha_creacion', \Carbon\Carbon::now())!!}
							 <br/> 
						    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}  
							{!! Form::close() !!}
										</div>
					                </div>
					            </div>
					        </div>
					    </div>
	
	@endsection 