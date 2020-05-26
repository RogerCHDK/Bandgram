<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    protected $table= 'bandas';
    protected $fillable = [
        'nombre', 'biografia', 'foto','status','artista_id','genero_id',
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
