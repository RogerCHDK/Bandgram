  @extends('template.master_usuario')

@section('contenido_central')    
 <br/><br/><br/><br/>
 @if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif 

    <div class="card shadow">
    <div class="card-header py-3">
            <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Productos</p> 
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
                                                <a class="event_title" href="{{ route('producto.usuario',$producto->id) }}" style="font-size: 22px;">{{$producto->nombre}}</a>
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