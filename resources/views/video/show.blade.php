@extends('template.master_artista')
 
@section('contenido_central') 
<div class="card shadow">
        <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">{{$videos->nombre}}</p> 
        </div> 

		<div class="card-body"> 
            <div class="row">
                <div class="col-lg-6 d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-xl-center" style="min-width: 100%;">
                	<video src="{{route('video.media',$videos->ruta)}}" width="300" height="300" controls style="min-width: 40%;max-height: 576px;"></video>
                </div>  
            </div>

			<div class="row">
                <div class="col-lg-6" style="min-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">
                            <div class="text-center">
                                <span style="color: rgb(0,0,0);font-size: 18px;">Video de&nbsp;<a class="event_title" href="view-profile.html" style="font-size: 20px;">{{$videos->artista->nombre}}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>

@endsection 