<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table= 'municipios';
    protected $fillable = [
        'nombre', 'status', 'estado_id'
    ]; 

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
