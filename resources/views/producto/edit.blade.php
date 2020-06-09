@extends('template.master_artista')
 
@section('contenido_central')  
 <div class="card shadow"> 
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Editar Producto</p>
        </div> 
	<div class="card-body"> 
            <div class="row d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center mb-3">
                <div class="col-lg-7">
                    <div class="p-5">
						{!! Form::open(['method' => 'PATCH','url' => 'productos/'.$producto->id]) !!} 
						@csrf 
						<br/> 
						{!!Form::label('nombre', 'Nombre del producto: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
					    {!!Form::text('nombre', $producto->nombre,['placeholder'=>'Ingresa el nombre del producto','class' => 'form-control form-control-user','type'=>'text','style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						<br/>
						{!!Form::label('precio', 'Ingresa el precio: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::number('precio',$producto->precio,['step'=>'any','placeholder'=>'Precio','class'=>'form-control form-control-user','style'=>'font-size: 18px;color: rgb(0,0,0);'])!!}
						<br/> 
						{!!Form::label('descripcion', 'Descripcion: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::textarea('descripcion',$producto->descripcion,['class'=>'form-control form-control-user','placeholder'=>'Descripción','style'=>'font-size: 18px;color: rgb(0,0,0);height: 160px;'])!!} 
						<br/>
						{!!Form::label('categoria_id', 'Categoria: ',['style'=>'font-size: 18px;color: rgb(0,0,0);margin-right: 10px;max-width: 100%;min-width: 100%;']); !!} 
						 {!!Form::select('categoria_id', $categoria->pluck('nombre','id'),$producto->categoria_id,['placeholder' => 'Categoria','class'=>'form-control display-inline-block','style'=>'height: 50px;font-size: 18px;color: rgb(0,0,0);']) !!}  
						 <br/> 
						{!!Form::label('stock', 'Ingresa el stock en existencia: ',['style'=>'font-size: 18px;color: rgb(0,0,0);']); !!} 
						{!!Form::number('stock',$producto->stock)!!}
						<br/>
					    {!!Form::submit('Enviar',['style'=>'font-size: 18px;width: 80%;margin: auto;','class'=>'btn btn-primary btn-block text-white btn-user']);!!}
						{!! Form::close() !!}
										</div>
					                </div>
					            </div>
					        </div>
					    </div>
@endsection 