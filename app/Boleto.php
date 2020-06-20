<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $table= 'boletos';
    protected $fillable = [
        'precio', 'stock', 'evento_id','status',
    ]; 

    public function evento()
    {
        return $this->belongsTo('App\Evento'); 
    }

    public function compra()
    {
        return $this->hasMany('App\CompraBoleto'); 
    }
}
