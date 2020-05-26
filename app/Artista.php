<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Artista extends Authenticatable
{
    protected $table= 'artistas';
    protected $fillable = [
        'nombre', 'email', 'password','ap_paterno','ap_materno','foto',
        'biografia','genero_id','status','tipo_usuario',
    ]; 
} 
