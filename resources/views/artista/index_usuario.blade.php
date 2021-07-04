@extends('template.master_usuario')
@section('contenido_central')   
<div class="card shadow">
	<div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Artistas</p> 
        </div> 
        <div class="card-body">  
        	<div class="row"> 
                <div class="col-lg-6" style="min-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">


                            <div class="tab-content">
                        	<div class="card shadow"> 
                            <div class="card-body"> 
                            <div class="row">
                            	@foreach($artistas as $artista)
                             <div class="col-md-6 col-lg-4">
                                    <div class="card border-0">
                                        <a href="{{ route('artista.show',$artista->id) }}">
                                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center marco zoom-on-hover">
                                                <img class="img-fluid image" src="{{route('artista.imagen',$artista->foto)}}" style="min-width: 40%;max-height: 576px;">
                                            </div>  
                                        </a>
                                        <div class="card-body text-center">
                                            <h6>
                                                <a class="event_title" href="{{ route('artista.usuario',$artista->id) }}" style="font-size: 22px;">{{$artista->nombre}}</a>
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