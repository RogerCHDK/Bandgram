<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table= 'tarjeta_credito';
    protected $fillable = [
        'titular', 'numero', 'mes','anio','user_id','status',
    ]; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
