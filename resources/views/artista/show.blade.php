

@extends(Auth::user()->tipo_usuario == 1 ? 'template.master_usuario' : 'template.master_artista')  


@section('contenido_central')   


<div class="card shadow">
	<div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">{{$artista->nombre}} {{$artista->ap_paterno}} {{$artista->ap_materno}}</p> 
        </div> 
        <div class="card-body"> 
        	<div class="row"> 
                <div class="col-lg-6" style="min-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">
                            


                             <div class="tab-content">
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Biografia</p> 
                                </div> 
                            <div class="row">
                                <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$artista->biografia}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="tab-content">
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Musica</p> 
                                </div> 
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
                                                <a class="event_title" 
                                                href="{{$usuario->tipo_usuario == 1 ? route('cancion.usuario',$cancion->id) : route('canciones.show',$cancion->id)}}" 
                                                style="font-size: 22px;">{{$cancion->nombre}}</a>
                                            </h6>
                                        </div>
                                        

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="tab-content">
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Videos</p> 
                                </div> 
                            <div class="row">
                                @foreach($videos as $video)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0">
                                        <a href="{{ route('videos.show',$video->id) }}">
                                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center marco zoom-on-hover">
                                                <video src="{{route('video.media',$video->ruta)}}" width="300" height="300" controls></video>

                                            </div> 
                                        </a>
                                        <div class="card-body text-center"> 
                                            <h6>
                                                <a class="event_title" 
                                                href="{{$usuario->tipo_usuario == 1 ? route('video.usuario',$video->id) : route('videos.show',$video->id) }}"
                                                 style="font-size: 22px;">{{$video->nombre}}</a>
                                            </h6>
                                        </div>
                                        

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Eventos</p> 
                                </div> 
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
                                                <a class="event_title" 
                                                href="{{$usuario->tipo_usuario == 1 ? route('evento.usuario',$evento->id) : route('eventos.show',$evento->id) }}" 
                                                style="font-size: 22px;">{{$evento->nombre_locacion}}</a>
                                            </h6>
                                        </div>
                                        

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                 <div class="tab-content">
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Productos</p> 
                                </div> 
                            <div class="row">
                                @foreach($productos as $producto)

                                <div class="col-md-6 col-lg-4"> 
                                    <div class="card border-0">
                                        <div id="carouselExampleControls{{$producto->id}}" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner"> 
                                                @foreach($producto->fotos as $foto) 
                                                @if($loop->first)  
                                                <div class="carousel-item active">
                                                  <img class="d-block w-100" src="{{route('productos.imagen',$foto->foto)}}" alt="" style="min-width: 40%;max-height: 576px;">
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                  <img class="d-block w-100" src="{{route('productos.imagen',$foto->foto)}}" alt="" style="min-width: 40%;max-height: 576px;">
                                                </div>
                                                @endif
                                                @endforeach
                                              </div>
                                              <a class="carousel-control-prev" href="#carouselExampleControls{{$producto->id}}" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="carousel-control-next" href="#carouselExampleControls{{$producto->id}}" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                        </div>

                                        <div class="card-body text-center">
                                            <h6>
                                                <a class="event_title" 
                                                href="{{$usuario->tipo_usuario == 1 ? route('producto.usuario',$producto->id) : route('productos.show',$producto->id) }}" 
                                                style="font-size: 22px;">{{$producto->nombre}}</a>
                                            </h6>
                                        </div>
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                 <div class="tab-content">
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Boletos</p> 
                                </div> 
                            <div class="row">
                                @foreach($eventos as $evento)
                                <div class="col-md-6 col-lg-4"> 
                                    <div class="card border-0">
                                        <div id="carouselExampleControls{{$evento->id}}b" class="carousel slide" data-ride="carousel">
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
                                              <a class="carousel-control-prev" href="#carouselExampleControls{{$evento->id}}b" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="carousel-control-next" href="#carouselExampleControls{{$evento->id}}b" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                              </a>
                                        </div>

                                        <div class="card-body text-center">
                                            <h6>
                                                @foreach($evento->boletos as $boleto)
                                                <a class="event_title" 
                                                href="{{$usuario->tipo_usuario == 1 ?  route('boleto.usuario',$boleto->id) : route('boletos.show',$boleto->id) }}" 
                                                style="font-size: 22px;">{{$evento->nombre_locacion}}</a><br/>
                                                <a class="event_title" 
                                                href="{{$usuario->tipo_usuario == 1 ?  route('boleto.usuario',$boleto->id) : route('boletos.show',$boleto->id) }}"
                                                style="font-size: 22px;">${{$boleto->precio}}</a>
                                                @endforeach
                                            </h6>
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