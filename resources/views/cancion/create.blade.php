 @extends('template.master_artista')
@section('contenido_central')  

		<div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Crear canción</p>
        </div> 
	<div class="card-body">   
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5">
                        {!! Form::open(['url' => 'canciones','files' => true]) !!} 
						@csrf  
						<div class="form-group row">
						{!!Form::label('nombre', 'Nombre de la cancion: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
					    {!!Form::text('nombre', null,['placeholder'=>'Ingresa el nombre de la canción','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
					     </div>
					     <div class="form-group row">
						{!!Form::label('ruta', 'Selecciona la canción: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::file('ruta')!!}  
						</div>
						 <div class="form-group row">
						{!!Form::label('album', 'Album: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
					    {!!Form::text('album', null,['placeholder'=>'Ingresa el nombre del album','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						</div>
						<div class="form-group row">
						{!!Form::label('foto', 'Sube una foto: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::file('foto')!!}
						</div>
						<div class="form-group row">
						{!!Form::label('genero_id', 'Género Musical: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
						 {!!Form::select('genero_id', $genero->pluck('nombre','id'),null,['placeholder' => 'Genero','class'=>'form-control display-inline-block','style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']) !!} 
						 </div>

						 {!!Form::hidden('artista_id',$artista); !!} 
						{!!Form::hidden('status', 1); !!}
						 <br/> 
					    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}  
						{!! Form::close() !!}
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
	
	
	@endsection