@extends('template.master_artista')

@section('contenido_central')     
 @if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow">
    <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Mis Canciones</p> 
        </div> 
        <div class="card-body">  
            <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('canciones.create')}}">Agregar canción</a> 
            <div class="row">  
                <div class="col-lg-6" style="min-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">
                            <div class="tab-content">
                            <div class="card shadow">  
                            <div class="card-body"> 
                            <div class="row">
                                @foreach($canciones as $cancion)
                             <div class="col-md-6 col-lg-4">
                                    <div class="card border-0">
                                        <a href="{{ route('canciones.show',$cancion->id) }}">
                                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center marco zoom-on-hover">
                                                <img class="img-fluid image" src="{{route('cancion.imagen',$cancion->foto)}}" style="min-width: 40%;max-height: 576px;">

                                            </div> 
                                        </a>
                                        <div>
                                            <audio src="{{route('cancion.audio',$cancion->ruta)}}" controls autoplay loop>
                                        </div>
                                        <div class="card-body text-center">
                                            <h6>
                                                <a class="event_title" href="{{ route('canciones.show',$cancion->id) }}" style="font-size: 22px;">{{$cancion->nombre}}</a>
                                            </h6> 
                                            <a href="{{route('canciones.edit',$cancion->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                                            {!!Form::open(['method' =>'DELETE', 'url' =>'canciones/'.$cancion->id]) !!}
                                            {!!Form::submit('Eliminar',['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
@endsection 