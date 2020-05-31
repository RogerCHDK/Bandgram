<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bienvenida'); 
})->name('inicio'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('usuario','UsuariosController'); 
Route::resource('artista','ArtistasController');
Route::resource('canciones','CancionesController');
Route::resource('videos','VideosController'); 
Route::resource('productos','ProductosController');
Route::resource('eventos','EventosController');
Route::resource('boletos','BoletosController'); 
Route::resource('bandas','BandasController');

Route::get('/index_cancion', 'CancionesController@index_usuario')->name('canciones.index_usuario');
Route::get('/index_video', 'VideosController@index_usuario')->name('videos.index_usuario');
Route::get('/index_producto', 'ProductosController@index_usuario')->name('productos.index_usuario');
Route::get('/index_evento', 'EventosController@index_usuario')->name('eventos.index_usuario');
Route::get('/index_boleto', 'BoletosController@index_usuario')->name('boletos.index_usuario');
Route::get('/index_banda', 'BandasController@index_usuario')->name('bandas.index_usuario');
 
Route::get('cancion-imagen/{filename}', 'CancionesController@getImage')->name('cancion.imagen');
Route::get('cancion-audio/{filename}', 'CancionesController@getMusic')->name('cancion.audio');
Route::get('video-media/{filename}', 'VideosController@getVideo')->name('video.media');
Route::get('banda-imagen/{filename}', 'BandasController@getImage')->name('banda.imagen');

//Metodos ajax
Route::get('combo_municipios/{estado_id}', 'AjaxController@municipios');

Route::group(['middleware'=>'auth'], function(){
Route::get('sin_acceso', function(){
	$usuario=\Auth::user();
	return view("mensaje.error_acceso_usuario")
	->with('message','Privilegios insuficientes para acceder a esta seccion. Es necesario iniciar 
		sesion como Artista para tener acceso a esta seccion');
})->name('usuario.error');

Route::get('sin_acceso2', function(){
return view("mensaje.error_acceso_artista")->with('usuario',$usuario)
	->with('message','Privilegios insuficientes para acceder a esta seccion. Es necesario iniciar 
		sesion como Usuario para tener acceso a esta seccion');
})->name('artista.error');

});

Route::group(['middleware'=>'artista'], function(){
	//Route::resource('canciones','CancionesController');
	//Route::resource('videos','VideosController'); 
	//Route::resource('productos','ProductosController');
	//Route::resource('eventos','EventosController');
	//Route::resource('boletos','BoletosController'); 
	//Route::resource('bandas','BandasController');
	});