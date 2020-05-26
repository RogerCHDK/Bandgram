<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table= 'videos';
    protected $fillable = [
        'nombre', 'ruta','status','artista_id',
    ]; 

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }
}
