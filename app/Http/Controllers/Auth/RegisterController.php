<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Artista;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Intervention\Image\ImageManagerStatic as Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers; 

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['tipo_usuario'] == 1) {
          return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]); 
        }elseif ($data['tipo_usuario'] == 2) {
            return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:artistas'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['tipo_usuario'] == 1) {
           return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'ap_paterno' => $data['ap_paterno'],
            'ap_materno' => $data['ap_materno'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'genero' => $data['genero'],
            'calle' => $data['calle'],
            'colonia' => $data['colonia'],
            'estado_id' => $data['estado_id'],
            'municipio_id' => $data['municipio_id'],
            'status' => $data['status'],
            'tipo_usuario' => $data['tipo_usuario'],
            'password' => Hash::make($data['password']),
        ]);
        }elseif ($data['tipo_usuario'] == 2) {

            $imagen = $data['foto'];
            if ($imagen) {
                //ponerle un nombre unico
            $imagen_nombre = time().$imagen->getClientOriginalName();
            $imagen_redimensionada = Image::make($imagen);

            //Guardar la imagen
            //Storage::disk('cancion')->put($imagen_nombre, File::get($imagen));
            $imagen_redimensionada->resize(200,null,function($c){
                $c->aspectRatio();
            })->save(storage_path('app/artista/'.$imagen_nombre));

            $data['foto'] = $imagen_nombre;
            }

            return Artista::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'ap_paterno' => $data['ap_paterno'],
            'ap_materno' => $data['ap_materno'],
            'foto' => $data['foto'],
            'biografia' => $data['biografia'],
            'genero_id' => $data['genero_id'],
            'status' => $data['status'],
            'tipo_usuario' => $data['tipo_usuario'],
            'password' => Hash::make($data['password']), 
        ]); 
        }
        
    }

     protected function redirectTo($user) 
    {
        if ($user->tipo_usuario == 1) {
            return 'usuario';
        }elseif ($user->tipo_usuario == 2) {
           return 'artista';       }
          
            
    }
}
