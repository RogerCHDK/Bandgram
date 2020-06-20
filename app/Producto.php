<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     protected $table= 'productos';
    protected $fillable = [
        'nombre', 'precio', 'descripcion','status','artista_id','categoria_id','stock'
    ]; 

    public function artista()
    {
        return $this->belongsTo('App\Artista');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function fotos()
    {
        return $this->hasMany('App\FotoProducto'); 
    }

    public function compra()
    {
        return $this->hasMany('App\Compra'); 
    }
}
