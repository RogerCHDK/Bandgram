@extends('template.master_artista')

@section('contenido_central')  


<div class="card shadow">
	<div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Bienvenido {{$artista->nombre}} {{$artista->ap_paterno}} {{$artista->ap_materno}}</p> 
        </div> 
        <div class="card-body"> 
        	<div class="row">
                <div class="col-lg-6" style="min-width: 100%;">
                    <div class="p-5">
                        <div class="text-center">
                            <div class="d-flex d-sm-flex d-md-flex justify-content-center justify-content-sm-center justify-content-md-center" style="margin-bottom: 24px;">
                                <div class="row row-date">
                                    <div class="col-lg-7" style="margin: 0 auto;min-width: 100%;">
                                        <div style="min-width: 50%;">
                                            <h4 class="mb-2" style="color: #267d24;font-size: 22px;">Biografía </h4>
                                            <span class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center" style="color: rgb(0,0,0);font-size: 18px;">{{$artista->biografia}}</span>
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

<h2 align="center">BIO</h2>  
<br/>
<p align="center">{{$artista->biografia}}</p>

<h2 align="center">MÚSICA</h2>

<h2 align="center">VIDEOS</h2>

<h2 align="center">EVENTOS</h2>

<h2 align="center">PRODUCTOS</h2>

<h2 align="center">BOLETOS</h2>
@endsection  