 @extends('template.master_usuario')

@section('contenido_central') 
<h2>{{$usuario->nombre}}</h2>
<h2>{{$usuario->ap_paterno}}</h2>
<h2>{{$usuario->ap_materno}}</h2>
<h2>{{$usuario->fecha_nacimiento}}</h2>
<h2>{{$usuario->genero}}</h2>
<h2>{{$usuario->calle}}</h2>
<h2>{{$usuario->colonia}}</h2>
<h2>{{$usuario->email}}</h2>

@endsection 