<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','ap_paterno','ap_materno','fecha_nacimiento',
        'genero','calle','colonia','estado_id','municipio_id','email','password',
        'status','tipo_usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }

    public function tipo_usuario()
    {
        return $this->belongsTo('App\TipoUsuario');
    }

}
