<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
   protected $table= 'eventos';
    protected $fillable = [
        'descripcion', 'fecha_creacion', 'fecha_inicio','hora_inicio','calle','colonia',
        'estado_id','municipio_id','nombre_locacion','artista_id','status'
    ]; 

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
}
