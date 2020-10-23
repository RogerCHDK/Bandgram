@extends('template.master_artista')
@section('contenido_central')  

		<div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Crear Producto</p>
        </div> 
	<div class="card-body"> 
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7"> 
                    <div class="p-5"> 
							{!! Form::open(['url' => 'productos']) !!}
							@csrf 
							<div class="form-group row">
							{!!Form::label('nombre', 'Nombre del producto: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    {!!Form::text('nombre', null,['placeholder'=>'Ingresa el nombre del producto','class' => 'form-control form-control-user'.($errors->has('nombre') ? ' is-invalid' : ''),'type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
							</div> 
							<div class="form-group row">
							{!!Form::label('precio', 'Ingresa el precio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!}
							{!!Form::number('precio',null,['step'=>'any','placeholder'=>'Precio','class'=>'form-control form-control-user'.($errors->has('precio') ? ' is-invalid' : ''),'style'=>'font-size: 18px;color: rgb(0,0,0);']);!!}
							@error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
							</div>
							<div class="form-group row">
							{!!Form::label('descripcion', 'Descripcion: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::textarea('descripcion',null,['class'=>'form-control form-control-user'.($errors->has('descripcion') ? ' is-invalid' : ''),'placeholder'=>'Descripción','style'=>'font-size: 18px;color: rgb(0,0,0);height: 160px;'])!!} 
							@error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
							</div>
							<div class="form-group row">
							{!!Form::label('categoria_id', 'Categoria: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
							 {!!Form::select('categoria_id', $categoria->pluck('nombre','id'),null,['placeholder' => 'Categoria' ,'class'=>'form-control display-inline-block'.($errors->has('categoria_id') ? ' is-invalid' : ''),'style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']) !!} 
							 @error('categoria_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror 
							 </div>
							<div class="form-group row"> 
							{!!Form::label('stock', 'Ingresa el stock en existencia: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
							{!!Form::number('stock',null,['step'=>'any','placeholder'=>'Stock','class'=>'form-control form-control-user'.($errors->has('stock') ? ' is-invalid' : ''),'style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
							@error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>  
                                        </span>
                            @enderror
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