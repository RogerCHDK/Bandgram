<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoProducto extends Model
{
   protected $table= 'fotos_producto';
    protected $fillable = [
       'foto','status','producto_id',
    ]; 

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
