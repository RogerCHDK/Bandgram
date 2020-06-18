<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table= 'integrantes';
    protected $fillable = [
        'status','artista_id','banda_id',
    ]; 

    public function artista() 
    {
        return $this->belongsTo('App\Artista');
    }

    public function banda() 
    {
        return $this->belongsTo('App\Banda');  
    }
}
