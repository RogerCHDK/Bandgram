@extends('template.master_artista')

@section('contenido_central')  

<h2>Bienvenido {{$artista->nombre}} {{$artista->ap_paterno}} {{$artista->ap_materno}}</h2>

<h2 align="center">BIO</h2>
<br/>
<p align="center">{{$artista->biografia}}</p>

<h2 align="center">MÚSICA</h2>

<h2 align="center">VIDEOS</h2>

<h2 align="center">EVENTOS</h2>

<h2 align="center">PRODUCTOS</h2>

<h2 align="center">BOLETOS</h2>
@endsection  