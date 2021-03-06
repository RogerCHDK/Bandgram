@extends('template.master_usuario')
 
@section('contenido_central') 

<div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">{{$eventos->nombre_locacion}}</p> 
        </div> 


		<div class="card-body">  

            <div class="row">
                <div class="col-lg-6 d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-xl-center" style="min-width: 100%;">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner"> 

                    @foreach($fotos as $foto)
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
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
            </div>
            </div>

			<div class="row">
                <div class="col-lg-6" style="min-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Descripcion </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->descripcion}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Fecha de creación : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->fecha_creacion}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Fecha de incio : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->fecha_inicio}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Hora de incio : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->hora_inicio}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Calle : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->calle}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Colonia : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->colonia}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Estado : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->estado->nombre}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Municipio : </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$eventos->municipio->nombre}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <span style="color: rgb(0,0,0);font-size: 18px;">Evento de&nbsp;<a class="event_title" href="view-profile.html" style="font-size: 20px;">{{$eventos->artista->nombre}}</a></span>
                            </div>
                            {!!Form::open(['method' =>'POST', 'url' =>'asistir-evento']) !!}
                            {!!Form::hidden('evento_id',$eventos->id); !!} 
                            {!!Form::hidden('status', 1); !!}
                            {!!Form::submit('Asistir',['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div> 
     </div>

@endsection 