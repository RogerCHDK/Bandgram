@extends('template.master') 


@section('contenido_central') 
<div class="container">
<div class="container d-flex h-100 align-items-center">
	<div class="mx-auto text-center">
		<div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Registro</p> 
        </div> 
	<div class="card-body">  
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5"> 

							{!! Form::open(['url' => 'register','files' => true]) !!}

							@csrf  
						    <div class="form-group row">
						    {!!Form::label('nombre', 'Nombre: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('nombre', null,['placeholder'=>'Ingresa tu nombre','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
					        <div class="form-group row">
						    {!!Form::label('ap_paterno', 'Apellido Paterno: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('ap_paterno', null,['placeholder'=>'Ingresa tu apellido paterno','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
					        <div class="form-group row">
							{!!Form::label('ap_materno', 'Apellido Materno: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('ap_materno', null,['placeholder'=>'Ingresa tu apellido materno','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
					        <div class="form-group row">
							{!!Form::label('fecha_nacimiento', 'Fecha de nacimiento: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::date('fecha_nacimiento',null,['class'=>'form-control form-control-user'])!!}
							</div>
					        <div class="form-group row">
							{!!Form::select('genero', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['placeholder' => 'Genero','class'=>'form-control display-inline-block','style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']);!!} 
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
						    {!!Form::text('calle', null,['placeholder'=>'Ingresa tu calle','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
					        <div class="form-group row">
							{!!Form::label('colonia', 'Colonia: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('colonia', null,['placeholder'=>'Ingresa tu colonia','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							</div>
					        <div class="form-group row">
							{!!Form::label('email', 'Email: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::email('email',null,['class'=>'form-control form-control-user','style'=>'font-size: 18px;color: rgb(0,0,0);']);!!} 
							</div>
					        <div class="form-group row">
							{!!Form::label('password', 'Contraseña: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!}
							{!!Form::password('password',['class'=>'form-control form-control-user','style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
							</div>	
							{!!Form::hidden('tipo_usuario', 1); !!}
							{!!Form::hidden('status', 1); !!}
							<br/>
						    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 90%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!} 
							{!! Form::close() !!}
							            </div>
					                </div>
					            </div>
					        </div>
					    </div>
					   </div>
					   </div>
					   </div>

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
			$('#municipio_id').append('<option value="'+ municipios[i].id + '">'+ municipios[i].nombre
				+ '</option>'); 
		}
      }
    });

  }
</script>
						
@endsection

