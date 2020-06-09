<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table= 'canciones';
    protected $fillable = [
        'nombre', 'ruta', 'foto','status','artista_id','genero_id','album',
    ]; 

    public function artista()
    {
        return $this->belongsTo('App\Artista'); 
    }

    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }
}
