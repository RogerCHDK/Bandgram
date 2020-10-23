<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraBoleto extends Model
{
    protected $table= 'compra_boletos';
    protected $fillable = [
        'boleto_id', 'user_id','status',
    ]; 

    public function usuario()
    {
        return $this->belongsTo('App\User','user_id','id'); 
    } 

    public function boleto() 
    {
        return $this->belongsTo('App\Boleto','boleto_id','id');
    }
}
