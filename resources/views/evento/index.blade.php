@extends('template.master_artista')

@section('contenido_central') 
<div class="card shadow">
    <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Mis Eventos</p> 
        </div> 
        <div class="card-body">  
           <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('eventos.create')}}">Agregar evento</a> 
            <div class="row">  
                <div class="col-lg-6" style="min-width: 100%;"> 
                    <div class="p-5">
                        <div class="text-center">
                            <div class="tab-content">
                            <div class="card shadow">  
                            <div class="card-body"> 
                            <div class="row">
                               @foreach($eventos as $evento)

                                <div class="col-md-6 col-lg-4"> 
                                    <div class="card border-0">
                                        <div id="carouselExampleControls{{$evento->id}}" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner"> 
                                                @foreach($evento->fotos as $foto) 
                                                @if($loop->first) 
                                                <div class="carousel-item active">
                                                  <img class="d-block w-100" src="{{route('eventos.imagen',$foto->foto)}}" alt="" style="min-width: 40%;max-height: 576px;">
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                  <img class="d-block w-100" src="{{route('eventos.imagen',$foto->foto)}}" alt="" style="min-width: 40%;max-height: 576px;">
                                                </div>
                                                @endif
                                                @endforeach
                                              </div>
                                              <a class="carousel-control-prev" href="#carouselExampleControls{{$evento->id}}" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="carousel-control-next" href="#carouselExampleControls{{$evento->id}}" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                        </div>

                                        <div class="card-body text-center">
                                            <h6>
                                                <a class="event_title" href="{{ route('eventos.show',$evento->id) }}" style="font-size: 22px;">{{$evento->nombre_locacion}}</a>
                                            </h6>
                                            <a href="{{route('evento.imagen',$evento->id)}}" class="btn btn-link">Agregar Imagen</a> 
                                            <a href="{{route('eventos.edit',$evento->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                                            {!!Form::open(['method' =>'DELETE', 'url' =>'eventos/'.$evento->id]) !!}
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