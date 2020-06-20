@extends('template.master_usuario')
 
@section('contenido_central') 

  <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">{{$boletos->evento->nombre_locacion}}</p> 
        </div> 

		<div class="card-body">  
            <div class="row">
                <div class="col-lg-6 d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-xl-center" style="min-width: 100%;">
                   <div id="carouselExampleControls{{$boletos->evento->id}}b" class="carousel slide" data-ride="carousel">
                                              <div class="carousel-inner"> 
                                                @foreach($boletos->evento->fotos as $foto) 
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
                                              <a class="carousel-control-prev" href="#carouselExampleControls{{$boletos->evento->id}}b" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                              </a>
                                              <a class="carousel-control-next" href="#carouselExampleControls{{$boletos->evento->id}}b" role="button" data-slide="next">
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
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Precio </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$boletos->precio}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Stock </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$boletos->stock}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <span style="color: rgb(0,0,0);font-size: 18px;">Evento de&nbsp;<a class="event_title" href="{{route('artista.show',$boletos->evento->artista->id)}}" style="font-size: 20px;">{{$boletos->evento->artista->nombre}}</a></span>
                            </div> 
                            <a class="btn btn-primary" style="width: 250px; height: 45px;" href="{{route('compra.boleto',$boletos->id)}}">Comprar</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

@endsection 