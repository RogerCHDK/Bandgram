<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoEvento extends Model
{
    protected $table= 'fotos_evento';
    protected $fillable = [
        'foto', 'evento_id','status',
    ]; 

    public function evento()
    {
        return $this->belongsTo('App\Evento');
    }
}
