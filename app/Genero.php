<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table= 'generos';
    protected $fillable = [
        'nombre','status',
    ]; 

    public function canciones()
    {
        return $this->hasMany('App\Cancion');
    }
 
}
