<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table= 'compra';
    protected $fillable = [
        'producto_id', 'user_id','status',
    ]; 

    public function usuario()
    {
        return $this->belongsTo('App\User','user_id','id'); 
    } 

    public function producto() 
    {
        return $this->belongsTo('App\Producto','producto_id','id');
    }
}
