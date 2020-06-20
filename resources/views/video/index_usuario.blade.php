@extends('template.master_usuario')

@section('contenido_central')  

<div class="card shadow"> 
    <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Videos</p> 
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
                                                <a class="event_title" href="{{ route('video.usuario',$video->id) }}" style="font-size: 22px;">{{$video->nombre}}</a>
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