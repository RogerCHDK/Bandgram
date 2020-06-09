@extends('template.master_usuario')
<script>
  function filtrar(id){
    var asset = '{{asset('')}}';
    var ruta = asset + 'filtrar_genero/'+id;
    //alert(ruta);  
    
    $.ajax({
      type: 'GET', 
      url: ruta,
      success:function(data){
        //alert(data[0].nombre); 
        $("#musica_contenido").html(data);
      }
    });
 
  }
</script>
@section('contenido_central')      
 <div class="tab-content"> 
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                <div class="card shadow">
                    <div class="card-body text-left d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-start justify-content-sm-start justify-content-md-start justify-content-lg-start justify-content-xl-start">
                        <div class="dropdown" style="width: 200px;">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="font-size: 18px;">Generos</button>
                            <div class="dropdown-menu" role="menu" style="width: 180px;font-size: 16px;">
                                @foreach($generos as $genero)  
                                <a  href="#" class="dropdown-item" role="presentation" onclick="filtrar({{$genero->id}});">{{$genero->nombre}}</a>
                                 @endforeach 
                            </div>
                        </div>
                    </div>

                    <div id="musica_contenido">
                    @foreach($generos as $genero)
                    <div class="card-body" id="{{$genero->nombre}}">
                        <div class="text-center">
                            <h1 class="mb-4" style="font-size: 30px;color: rgb(38,125,36);">{{$genero->nombre}}</h1>
                        </div> 
                        <div class="row" id="canciones_contenido">
                        @foreach($canciones as $cancion)
                         @if($genero->id == $cancion->genero_id)
                        
                            <div class="col-md-6 col-lg-4">
                                <div class="card border-0">
                                    <a href="{{route('canciones.show',$cancion->id)}}">
                                        <div class="marco zoom-on-hover">
                                        	<div class="text-center">
                                            <img class="img-fluid image" src="{{route('cancion.imagen',$cancion->foto)}}">
                                            </div> 
                                        </div>
                                    </a>
                                    <div class="card-body text-center">
                                        <h6>
                                            <a class="event_title" href="{{route('canciones.show',$cancion->id)}}" style="font-size: 22px;">{{$cancion->nombre}}<br></a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                       
                        @endif
                        @endforeach
                         </div>
                    </div>
                     @endforeach 
                     </div>
                </div>
            </div>
            </div>
@endsection 