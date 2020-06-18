@extends('template.master_artista')

@section('contenido_central') 
@if(session('message')) 
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif     
  <div class="tab-content"> 
                        <div class="card shadow"> 
                            <div class="card-body"> 
                                <div class="card-header py-3">
                                    <p class="text-center m-0 font-weight-bold" style="color: #267d24;font-size: 25px;">Bandas</p> 
                                </div> 
                            <div class="row">
                                @foreach($bandas as $banda)
                                @if($artista != $banda->artista_id)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0">
                                        <a href="{{ route('bandas.show',$banda->id) }}">
                                            <div class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center marco zoom-on-hover">
                                                <img class="img-fluid image" src="{{route('banda.imagen',$banda->foto)}}" style="min-width: 40%;max-height: 576px;">

                                            </div> 
                                        </a>
                                        <div class="card-body text-center">
                                            <h6>
                                                <a class="event_title" href="{{ route('bandas.show',$banda->id) }}" style="font-size: 22px;">{{$banda->nombre}}</a>
                               
                                            </h6>
                                            {!!Form::open(['url' =>'integrantes']) !!}
                                            {!!Form::hidden('banda_id',$banda->id); !!} 
                                            {!!Form::hidden('status', 0); !!}
                                            {!!Form::submit('Unirse',['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div> 
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

@endsection 