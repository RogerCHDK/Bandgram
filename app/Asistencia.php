<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table= 'asistencia';
    protected $fillable = [
        'evento_id', 'user_id','status',
    ]; 

    public function usuario()
    {
        return $this->belongsTo('App\User','user_id','id'); 
    } 

    public function evento() 
    {
        return $this->belongsTo('App\Evento','evento_id','id');
    }
}
